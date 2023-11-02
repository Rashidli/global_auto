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
        Schema::create('oil_product_translations', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('oil_product_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['oil_product_id','locale']);
            $table->foreign('oil_product_id')->references('id')->on('oil_products')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oil_product_translations');
    }
};
