<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master__pasiens', function (Blueprint $table) {
            $table->id();
            $table->text('no_rekam_medis');
            $table->text('nama_pasien');
            $table->text('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master__pasiens');
    }
}
