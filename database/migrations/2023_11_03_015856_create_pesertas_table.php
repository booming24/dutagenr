<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string("no_peserta");
            $table->string("nama_peserta");
            $table->string("foto");
            $table->enum("kategori", ["putra", "putri"]);
            $table->string("asal_instansi");
            $table->integer("point_semifinal");
            $table->integer("point_final");
            $table->enum("status", ["peserta", "semifinalis", "finalis"]);
            $table->boolean("isActive");
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
        Schema::dropIfExists('pesertas');
    }
}
