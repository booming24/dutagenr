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
            $table->enum("kategori", ["PUTRA", "PUTRI"]);
            $table->string("asal_instansi");
            $table->integer("point_semifinal")->nullable();
            $table->integer("point_final")->nullable();
            $table->enum("status", ["PESERTA", "SEMIFINALIS", "FINALIS"]);
            $table->boolean("isActive")->default(true);
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
