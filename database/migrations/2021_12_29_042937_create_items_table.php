<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_title');
            $table->string('item_url');
            $table->string('file_title');
            $table->string('file_url');
            $table->string('subfile_title');
            $table->string('subfile_url');
            $table->string('berkas_title');
            $table->string('berkas_url');
            $table->string('subserie_title');
            $table->string('subserie_url');
            $table->string('serie_title');
            $table->string('serie_url');
            $table->string('subfond_title');
            $table->string('subfond_url');
            $table->string('fond_title');
            $table->string('fond_url');
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
        Schema::dropIfExists('items');
    }
}
