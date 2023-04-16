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
        // membuat tabel pendidikan
        Schema::create('pendidikan', function (Blueprint $table) {
            // membuat kolom id dengan tipe data bigIncrements
            $table->bigIncrements('id');

            // membuat kolom nama dengan tipe data string
            $table->string('nama');

            // membuat kolom tingkatan dengan tipe data tinyInteger
            $table->tinyInteger('tingkatan');

            // membuat kolom tahun masuk dengan tipe data year
            $table->year('tahun_masuk');

            // membuat kolom tahun selesai dengan tipe data year
            $table->year('tahun_selesai');

            // membuat kolom created_at dan updated_at dengan tipe data timestamp
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
        // menghapus tabel pendidikan
        Schema::dropIfExists('pendidikan');
    }
};
