<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Surat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_surat');
            $table->string('kepada');
            $table->string('perihal');
            $table->text('isi_surat');
            $table->unsignedBigInteger('status');
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
