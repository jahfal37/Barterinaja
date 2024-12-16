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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();  // Kolom id dengan auto increment
            $table->string('title');  // Kolom judul postingan
            $table->text('content');  // Kolom isi postingan
            $table->string('username');  // Kolom username, menjadi foreign key
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');  // Status aktif/non-aktif
            $table->timestamps();  // Kolom created_at dan updated_at
            
            // Menambahkan foreign key yang mengarah ke kolom username di tabel users
            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
