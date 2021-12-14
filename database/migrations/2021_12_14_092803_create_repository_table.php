<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository', function (Blueprint $table) {
            $table->id();
            $table->string('kode_repository');
            $table->string('judul');
            $table->string('nama_file');
            $table->string('dosen_pembimbing');
            $table->string('penulis');
            $table->string('jurusan');
            $table->string('fakultas');
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
        Schema::dropIfExists('repository');
    }
}
