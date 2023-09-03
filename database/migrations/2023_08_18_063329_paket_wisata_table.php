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
        $table->integer('durasi')->nullable();
        $table->string('slot1')->nullable();
        $table->string('slot2')->nullable();
        $table->string('slot3')->nullable();
        $table->string('slot4')->nullable();
        $table->string('slot5')->nullable();
        $table->string('slot6')->nullable();
        $table->string('slot7')->nullable();
        $table->string('slot8')->nullable();
        $table->string('slot9')->nullable();
        $table->string('slot10')->nullable();
        $table->string('slot11')->nullable();
        $table->string('slot12')->nullable();
        $table->string('slot13')->nullable();
        $table->string('slot14')->nullable();
        $table->string('slot15')->nullable();
        $table->string('slot16')->nullable();
        $table->string('slot17')->nullable();
        $table->string('slot18')->nullable();
        $table->string('slot19')->nullable();
        $table->string('slot20')->nullable();
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
