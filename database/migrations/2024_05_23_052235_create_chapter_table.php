<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chapter', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('video_url');
            $table->foreignId('lesson_id')->constrained('lesson')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chapter', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
        });
        Schema::dropIfExists('chapter');
    }
};
