<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateProductsTable extends Migration
{
    public function up()
    {
        // Drop dulu tabel products kalau ada
        Schema::dropIfExists('products');

        // Buat tabel products baru
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('product_name');
            $table->string('barcode', 100)->nullable();
            $table->string('sku', 100)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('price');
            $table->integer('cost_price')->nullable();
            $table->integer('stock')->default(0);
            $table->string('unit', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('operator')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category_product')->onDelete('set null');
        });
    }

    public function down()
    {
        // Kalau rollback, hapus tabelnya
        Schema::dropIfExists('products');
    }
}
