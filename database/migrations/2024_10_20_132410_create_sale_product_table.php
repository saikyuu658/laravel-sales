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
        Schema::create('sale_product', function (Blueprint $table) {
            $table->id();
            $table->uuid('sale_id');
            $table->uuid('product_id');
            $table->integer('quantity'); 
            $table->decimal('total', 10, 2); 
            $table->timestamps();
    
            // Chaves estrangeiras
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_product');
    }
};
