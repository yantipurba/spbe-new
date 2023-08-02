<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('aduans', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->string('nama_perangkat_daerah');
                $table->bigInteger('nip');
                $table->string('nama');
                $table->string('jabatan');
                $table->bigInteger('no_telp');
                $table->string('email');
                $table->string('nama_lokasi');
                $table->string('kondisi_lokasi');
                $table->string('alamat');
                $table->string('kota_atau_kabupaten');
                $table->string('kecamatan');
                $table->string('kelurahan');
                $table->string('RT');
                $table->string('RW');
                $table->string('permohonan_kecepatan_internet');
                $table->string('file_dokumen'); // Ganti tipe kolom sesuai kebutuhan (misalnya, string untuk nama file)
                $table->string('file_gambar');
                $table->string('status');
                $table->text('alasan');

                $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('aduans');
    }
};
