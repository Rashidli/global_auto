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
        Schema::create('card_translations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['card_id','locale']);
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_translations');
    }
};