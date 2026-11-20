<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('id', 100)->primary();
            $table->string('title', 255);
            $table->string('topic_route', 191);
            $table->unsignedSmallInteger('lab_count')->default(0);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('labs', function (Blueprint $table) {
            $table->string('id', 64)->primary();
            $table->string('category_id', 100);
            $table->string('title', 500);
            $table->string('href', 191)->unique();
            $table->string('difficulty', 32);
            $table->string('difficulty_class', 64);
            $table->longText('description_html');
            $table->json('sections');
            $table->json('profile')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->index(['category_id', 'sort_order']);
            $table->index('difficulty');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('img', 255);
            $table->string('filename', 100);
            $table->string('name', 255);
            $table->string('cat', 120);
            $table->string('price', 32);
            $table->unsignedTinyInteger('stars')->default(5);
            $table->boolean('released')->default(true);
            $table->text('desc');
            $table->timestamps();
        });

        Schema::create('blog_posts', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('img', 255);
            $table->string('title', 255);
            $table->string('author', 120);
            $table->string('published_label', 64);
            $table->text('excerpt');
            $table->text('body');
            $table->timestamps();
        });

        Schema::create('lab_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('lab_id', 64);
            $table->boolean('exfiltrated')->default(false);
            $table->boolean('solved')->default(false);
            $table->timestamp('solved_at')->nullable();
            $table->string('logged_in_user', 100)->default('');
            $table->string('avatar_path', 255)->default('');
            $table->json('executable_exts');
            $table->string('carlos_secret', 64)->default('2B2tlPyJQfJDynyKME5D02Cw0ouydMpZ');
            $table->json('chat_history')->nullable();
            $table->timestamps();

            $table->foreign('lab_id')->references('id')->on('labs')->cascadeOnDelete();
            $table->unique(['user_id', 'lab_id']);
        });

        Schema::create('lab_uploaded_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('lab_id', 64);
            $table->string('storage_key', 120);
            $table->binary('content');
            $table->string('content_type', 120)->default('application/octet-stream');
            $table->unsignedBigInteger('expires_at_ms')->nullable();
            $table->timestamps();

            $table->foreign('lab_id')->references('id')->on('labs')->cascadeOnDelete();
            $table->unique(['user_id', 'lab_id', 'storage_key']);
        });

        if (in_array(DB::getDriverName(), ['mysql', 'mariadb'], true)) {
            DB::statement('ALTER TABLE lab_uploaded_files MODIFY content LONGBLOB NOT NULL');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_uploaded_files');
        Schema::dropIfExists('lab_sessions');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('products');
        Schema::dropIfExists('labs');
        Schema::dropIfExists('categories');
    }
};
