<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perpustakaan_id');
            $table->string('judul', 255);
            $table->string('tahun', 4);
            $table->string('author', 100);
            $table->string('penerbit', 100);
            $table->string('subyek', 100);
            $table->string('sampul', 100);
            $table->string('bahasa', 50);
            $table->string('isbn', 50)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
