<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_agenda');
            $table->string('nama_obrik');
            $table->string('jumlah_hari');
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->string('nomor_st');
            $table->string('tanggal_st');
            $table->date('dari_tanggal')->nullable();
            $table->date('sampai_tanggal')->nullable();
            $table->date('dl_1')->nullable();
            $table->date('dl_2')->nullable();
            $table->date('dl_3')->nullable();
            $table->date('tdt_kaper')->nullable();
            $table->string('no_laporan')->nullable();
            $table->date('tanggal_laporan')->nullable();
            $table->string('copy_jilid')->nullable();
            $table->date('kembali_dari_jilid')->nullable();
            $table->string('kirim_obrik_deputi')->nullable();
            $table->string('arsip_kka')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('scan_surat_st')->nullable();
            $table->string('scan_kulit_laporan')->nullable();
            $table->string('scan_laporan')->nullable();
            $table->string('status')->default('Dalam Proses')->nullable();
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
        Schema::dropIfExists('agenda');
    }
}
