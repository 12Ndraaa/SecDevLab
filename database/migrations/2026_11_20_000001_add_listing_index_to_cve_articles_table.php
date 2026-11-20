<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cve_articles', function (Blueprint $table) {
            $table->index(['status', 'is_hot', 'cve_year', 'cvss_score', 'id'], 'cve_articles_listing_idx');
            $table->index(['is_hot', 'cve_year', 'id'], 'cve_articles_owner_idx');
        });
    }

    public function down(): void
    {
        Schema::table('cve_articles', function (Blueprint $table) {
            $table->dropIndex('cve_articles_listing_idx');
            $table->dropIndex('cve_articles_owner_idx');
        });
    }
};
