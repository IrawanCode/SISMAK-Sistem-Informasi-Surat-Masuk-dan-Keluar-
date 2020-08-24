<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Disposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surat_dari');
            $table->date('tgl_surat');
            $table->date('tgl_terima');
            $table->string('no_surat');
            $table->unsignedBigInteger('no_agenda');
            $table->string('perihal');
            $table->string('aktor');
            $table->unsignedBigInteger('status');
            $table->enum('kepada',['Sdr. Ka. Sub. Bag. TU','Sdr. Ka. Sub. Bag. Kasie Produksi','Sdr. Ka. Sub. Bag. Kasie Sosial','Sdr. Ka. Sub. Bag. Kasie Distribusi','Sdr. Ka. Sub. Bag. Kasie Nerwilis','Sdr. Ka. Sub. Bag. Kasie IPDS']);
            $table->text('isi_disposisi');
            $table->string('diteruskan_kpd');
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
