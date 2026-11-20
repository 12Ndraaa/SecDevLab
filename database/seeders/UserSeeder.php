<?php

namespace Database\Seeders;

use App\Models\CveArticle;
use App\Models\LabSession;
use App\Models\LabUploadedFile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->upsertDemoUser(
            'owner@secdevlab.local',
            'owner@vulnlab.local',
            'Academy Owner',
            'owner12345',
            User::ROLE_OWNER
        );

        $this->upsertDemoUser(
            'user@secdevlab.local',
            'user@vulnlab.local',
            'Demo Learner',
            'user12345',
            User::ROLE_USER
        );
    }

    private function upsertDemoUser(
        string $email,
        string $legacyEmail,
        string $name,
        string $password,
        string $role
    ): void {
        DB::transaction(function () use ($email, $legacyEmail, $name, $password, $role): void {
            $account = User::whereRaw('LOWER(email) = ?', [strtolower($email)])->first();
            $legacy = User::whereRaw('LOWER(email) = ?', [strtolower($legacyEmail)])->first();

            if (! $account && $legacy) {
                $account = $legacy;
                $legacy = null;
            } elseif ($account && $legacy && $legacy->id !== $account->id) {
                CveArticle::where('author_id', $legacy->id)->update(['author_id' => $account->id]);

                $accountSessionsByLab = [];
                foreach (LabSession::where('user_id', $account->id)->get() as $sess) {
                    $accountSessionsByLab[strtolower((string) $sess->lab_id)] = $sess;
                }

                foreach (LabSession::where('user_id', $legacy->id)->get() as $legacySess) {
                    $labKey = strtolower((string) $legacySess->lab_id);
                    if (! isset($accountSessionsByLab[$labKey])) {
                        $legacySess->user_id = $account->id;
                        $legacySess->save();
                        $accountSessionsByLab[$labKey] = $legacySess;
                    } else {
                        $existingSess = $accountSessionsByLab[$labKey];
                        $dirty = false;
                        if ($legacySess->solved && ! $existingSess->solved) {
                            $existingSess->solved = true;
                            $existingSess->solved_at = $legacySess->solved_at;
                            $dirty = true;
                        }
                        if ($legacySess->exfiltrated && ! $existingSess->exfiltrated) {
                            $existingSess->exfiltrated = true;
                            $dirty = true;
                        }
                        if ($dirty) {
                            $existingSess->save();
                        }
                    }
                }

                $existingFileSet = [];
                foreach (LabUploadedFile::where('user_id', $account->id)->get(['lab_id', 'storage_key']) as $f) {
                    $existingFileSet[strtolower($f->lab_id.'|'.$f->storage_key)] = true;
                }

                LabUploadedFile::where('user_id', $legacy->id)->get()->each(static function (LabUploadedFile $file) use ($account, &$existingFileSet): void {
                    $composite = strtolower($file->lab_id.'|'.$file->storage_key);
                    if (! isset($existingFileSet[$composite])) {
                        $file->user_id = $account->id;
                        $file->save();
                        $existingFileSet[$composite] = true;
                    }
                });

                $legacy->delete();
            }

            $account ??= new User();
            $account->email = $email;
            $account->name = $name;
            $account->password = $password;
            $account->role = $role;
            $account->save();
        });
    }
}
