<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBeritasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->biginteger('category_id')->unsigned();
            $table->biginteger('user_id')->unsigned();
            $table->string('judul');
            $table->string('picture');
            $table->text('isi');
            $table->integer('status')->nullable();
            $table->integer('persetujuan_berita')->nullable();
            // $table->biginteger('comment_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beritas');
    }
}
