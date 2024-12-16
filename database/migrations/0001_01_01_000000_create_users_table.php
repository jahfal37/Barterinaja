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
        // Create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name')->unique(); // Role name
            $table->timestamps(); // Created at and Updated at
        });

        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // User's full name
            $table->string('username')->unique()->nullable(); // Username or Email, optional and unique
            $table->string('password'); // Password
            $table->enum('role', ['user', 'admin'])->default('user'); // Role column with default value 'user'
            $table->string('profile_picture')->nullable(); // Path to user's profile picture
            $table->text('bio')->nullable(); // Bio pengguna, opsional
            $table->string('store_name')->nullable(); // Nama toko, opsional
            $table->string('contact_number')->nullable(); // Nomor kontak, opsional
            $table->string('city')->nullable(); // Kota pengguna, opsional
            $table->string('email')->nullable(); // Kota pengguna, opsional
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps(); // Created at and Updated at
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('roles');
    }
};
