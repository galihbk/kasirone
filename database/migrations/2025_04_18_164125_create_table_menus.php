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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name'); // Nama menu, contoh: Pengaturan, User Management
            $table->string('url'); // Nama menu, contoh: Pengaturan, User Management
            $table->string('parent_id')->nullable();; // Nama menu, contoh: Pengaturan, User Management
            $table->string('status'); // Nama menu, contoh: Pengaturan, User Management
            $table->string('icon')->nullable(); // Icon menu, opsional
            $table->integer('order')->default(0); // Urutan tampil menu
            $table->boolean('has_submenu')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
