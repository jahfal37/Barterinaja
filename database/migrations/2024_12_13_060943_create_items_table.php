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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // bigint, auto-increment
            $table->unsignedBigInteger('user_id')->nullable(); // bigint(20), unsigned
            $table->string('product_name'); // varchar(255)
            $table->string('category'); // varchar(255)
            $table->string('tags')->nullable(); // varchar(255), null
            $table->text('description'); // text
            $table->string('city'); // varchar(255)
            $table->string('condition'); // varchar(255)
            $table->timestamps(); // created_at & updated_at
            $table->unsignedBigInteger('views')->default(0); // bigint(20), default 0

            // Foreign key constraint (optional, jika tabel users ada)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

