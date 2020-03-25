<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retalhos', function (Blueprint $table) {
            $table->id();
            $table->integer('num_lote');
            $table->decimal('comprimento');
            $table->decimal('largura');
            $table->decimal('area');
            $table->foreignId('id_tipoVidro');
            $table->foreignId('id_localizacao');
            $table->integer('num_of');
            $table->timestamps();

            $table->foreign('id_tipoVidro')->references('id')->on('tipos_vidro');
            $table->foreign('id_localizacao')->references('id')->on('localizacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retalhos');
    }
}
