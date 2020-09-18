<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePendaftaransTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('kta_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->string('no_tlp');
            $table->string('nama_gudep');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->biginteger('tingkatan_id')->unsigned();
            $table->string('bukti_pembayaran');
            $table->string('upload_berkas');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kta_id')->references('id')->on('ktas');
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamins');
            $table->foreign('tingkatan_id')->references('id')->on('tingkatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pendaftarans');
    }
}
