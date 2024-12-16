<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Menjalankan migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Menambahkan kolom 'id' auto increment
            $table->string('name');  // Kolom untuk nama produk
            $table->text('description')->nullable();  // Kolom untuk deskripsi produk
            $table->decimal('price', 10, 2);  // Kolom untuk harga produk
            $table->unsignedBigInteger('user_id');  // Kolom untuk user yang menambahkan produk
            $table->timestamps();  // Kolom created_at dan updated_at

            // Menambahkan foreign key untuk kolom user_id yang merujuk ke tabel 'users'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Membalikkan perubahan yang dilakukan oleh migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
