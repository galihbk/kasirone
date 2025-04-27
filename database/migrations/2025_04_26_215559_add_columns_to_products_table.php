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
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_code')->nullable()->after('id');
            $table->string('product_merk')->nullable()->after('product_code');
            $table->unsignedBigInteger('business_id')->nullable()->after('product_merk');
            $table->string('barcode')->nullable()->after('business_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['product_code', 'product_merk', 'business_id', 'barcode']);
        });
    }
};
