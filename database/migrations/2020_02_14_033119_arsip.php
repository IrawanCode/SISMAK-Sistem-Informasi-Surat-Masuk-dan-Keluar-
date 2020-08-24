<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Arsip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('jenis_surat',['Surat Masuk','Surat Keluar']);
            $table->string('surat_dari');
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('no_surat');
            $table->unsignedBigInteger('no_agenda');
            $table->string('perihal');
            $table->string('aktor');
            $table->string('kepada');
            $table->string('isi_disposisi');
            $table->text('isi_surat');
            $table->string('diteruskan_kepada');
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
        //
    }
}
