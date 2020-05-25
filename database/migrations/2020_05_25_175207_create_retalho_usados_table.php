<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetalhoUsadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retalho_usados', function (Blueprint $table) {
            $table->id();
            $table->decimal('comprimento');
            $table->decimal('largura');
            $table->decimal('area');
            $table->string('ref_obra');
            $table->string('num_of');
            $table->text('obs');
            $table->foreignId('id_seccao');
            $table->timestamps();

            $table->foreign('id_seccao')->references('id')->on('seccoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retalho_usados');
    }
}
