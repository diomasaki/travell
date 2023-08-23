<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PaketWisataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paketwisata', function (Blueprint $table) {
        $table->id();
        $table->string('paket_wisata');
        $table->integer('budget');
        $table->string('kota');
        $table->string('kategori');
        $table->text('img_paketwisata');
        $table->text('keterangan');
        $table->string('ratings');
        $table->text('itinerary');
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
        Schema::dropIfExists('paketwisata');
    }
}
