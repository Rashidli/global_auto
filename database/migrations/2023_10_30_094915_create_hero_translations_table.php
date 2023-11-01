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
        Schema::create('hero_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hero_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['hero_id', 'locale']);
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_translations');
    }
};
