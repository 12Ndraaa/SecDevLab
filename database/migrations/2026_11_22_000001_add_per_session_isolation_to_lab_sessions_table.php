<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lab_sessions', function (Blueprint $table) {
            $table->string('instance_token', 64)->nullable()->unique()->after('lab_id');
            $table->timestamp('expires_at')->nullable()->index()->after('instance_token');
            $table->boolean('instance_solved')->default(false)->after('exfiltrated');
            $table->json('session_secrets')->nullable()->after('carlos_secret');
            $table->json('workbench_state')->nullable()->after('exploit_state');
            $table->string('ui_theme', 16)->default('dark')->after('workbench_state');
        });

        // Backfill any pre-existing lab_sessions so legacy progress & instances transition safely
        $rows = DB::table('lab_sessions')->get(['id', 'solved', 'carlos_secret']);
        $expiresAt = now()->addMinutes(max(5, (int) config('lab.ttl_minutes', 60)));
        foreach ($rows as $row) {
            $token = bin2hex(random_bytes(16));
            $carlosSecret = bin2hex(random_bytes(16));
            $secrets = [
                'carlos_secret' => $carlosSecret,
                'file_secret' => bin2hex(random_bytes(10)),
                'admin_password' => 'adm_'.bin2hex(random_bytes(6)),
                'carlos_password' => 'crl_'.bin2hex(random_bytes(6)),
                'wiener_api_key' => bin2hex(random_bytes(16)),
                'carlos_api_key' => bin2hex(random_bytes(16)),
                'aws_secret' => 'AKIA'.strtoupper(bin2hex(random_bytes(8))).'/'.bin2hex(random_bytes(12)),
                'hostname' => 'lab-'.substr($token, 0, 8).'.secdevlab.internal',
                'csrf_token' => bin2hex(random_bytes(16)),
                'forgot_password_token' => bin2hex(random_bytes(10)),
                'tracking_id' => bin2hex(random_bytes(8)),
                'lab_session_cookie' => rtrim(strtr(base64_encode(json_encode([
                    'user' => 'wiener',
                    'role' => 'user',
                    'sid' => bin2hex(random_bytes(6)),
                ])), '+/', '-_'), '='),
                'users_table_suffix' => bin2hex(random_bytes(3)),
                'jwt_hs_secret' => bin2hex(random_bytes(12)),
                'oauth_client_secret' => 'sec_'.bin2hex(random_bytes(12)),
            ];

            DB::table('lab_sessions')
                ->where('id', $row->id)
                ->update([
                    'instance_token' => $token,
                    'expires_at' => $expiresAt,
                    'instance_solved' => (bool) $row->solved,
                    'carlos_secret' => $carlosSecret,
                    'session_secrets' => json_encode($secrets, JSON_UNESCAPED_SLASHES),
                    'ui_theme' => 'dark',
                ]);
        }
    }

    public function down(): void
    {
        Schema::table('lab_sessions', function (Blueprint $table) {
            $table->dropUnique(['instance_token']);
            $table->dropIndex(['expires_at']);
            $table->dropColumn([
                'instance_token',
                'expires_at',
                'instance_solved',
                'session_secrets',
                'workbench_state',
                'ui_theme',
            ]);
        });
    }
};
