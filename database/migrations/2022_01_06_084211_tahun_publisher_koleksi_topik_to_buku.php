<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TahunPublisherKoleksiTopikToBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buku', function (Blueprint $table) {
            //
            $table->year('tahun');
            $table->string('publisher');
            $table->string('koleksi');
            $table->string('topik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buku', function (Blueprint $table) {
            //
        });
    }
}
