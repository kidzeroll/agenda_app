<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda_pegawai', function (Blueprint $table) {
            $table->foreignId('agenda_id');
            $table->foreignId('pegawai_id');
            $table->primary(['agenda_id', 'pegawai_id']);

            $table->foreign('agenda_id')->references('id')->on('agenda')->onDelete('cascade');
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda_pegawai');
    }
}
