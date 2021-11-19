<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id');
            $table->string('recordtype', 100);
            $table->string('spelling', 100);
            $table->string('institution', 100);
            $table->string('collection', 100);
            $table->string('topic', 100);
            $table->string('description', 100);
            $table->string('format', 100);
            $table->string('spellingShingle', 100);
            $table->string('author_sort', 100);
            $table->string('title', 255);
            $table->string('title_short', 255);
            $table->string('title_full', 255);
            $table->string('title_fullStr', 255);
            $table->string('title_full_unstemmed', 255);
            $table->string('title_sort', 255);
            $table->string('callnumber', 100);
            $table->string('_version_', 100);
            $table->string('score', 100);
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
        Schema::dropIfExists('detail_bukus');
    }
}
