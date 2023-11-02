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
        Schema::create('brend_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brend_id');
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['brend_id','locale']);
            $table->foreign('brend_id')->references('id')->on('brends')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brend_translations');
    }
};
