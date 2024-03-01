<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\ErrorHandler\Error\FatalError;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->tinyText('gambar_produk');
            $table->integer('harga');
            $table->integer('harga_beli');
            $table->integer('stok');
            $table->date('tanggal_kadaluarsa');
            $table->integer('id_kategori');
            // $table->string('nama_kategori');
            $table->integer('id_diskon');
            $table->integer('diskon')->nullable();
            // $table->string('nama_diskon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
