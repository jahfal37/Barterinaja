<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();  // auto-increment primary key
            $table->string('title');  // Kolom untuk judul laporan
            $table->text('description');  // Kolom untuk deskripsi laporan
            $table->foreignId('user_id')->constrained('users');  // Relasi dengan tabel users (jika perlu)
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
