<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Reset pre-existing default 'dark' (or blank/null) lab sessions to 'light'
        DB::table('lab_sessions')
            ->where(function ($query): void {
                $query->where('ui_theme', 'dark')
                    ->orWhere('ui_theme', '')
                    ->orWhereNull('ui_theme');
            })
            ->update(['ui_theme' => 'light']);

        Schema::table('lab_sessions', function (Blueprint $table) {
            $table->string('ui_theme', 16)->default('light')->change();
        });
    }

    public function down(): void
    {
        Schema::table('lab_sessions', function (Blueprint $table) {
            $table->string('ui_theme', 16)->default('dark')->change();
        });
    }
};
