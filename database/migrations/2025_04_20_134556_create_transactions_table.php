<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');;
            // Mengambil dari table `users`, tapi field business_id

            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->integer('amount');
            $table->string('payment_type')->nullable();
            $table->string('payment_code')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
