<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrxRegistrasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trx__registrasis', function (Blueprint $table) {
            $table->id();
            $table->text('nomor_registrasi');
            $table->timestamp('waktu_registrasi');
            $table->text('jenis_registrasi');
            $table->text('status_registrasi');
            $table->timestamp('waktu_mulai_pelayanan');
            $table->dateTime('waktu_selesai_pelayanan');
            $table->text('id_pasien');
            $table->text('id_layanan');
            $table->text('id_pembayaran');
            $table->text('id_petugas');
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
        Schema::dropIfExists('trx__registrasis');
    }
}
