<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('sender_id');   // User yang mengirim pesan
          $table->unsignedBigInteger('receiver_id'); // User yang menerima pesan
          $table->text('content');                  // Isi pesan
          $table->timestamps();

          // Foreign key untuk sender dan receiver
          $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};