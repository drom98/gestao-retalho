<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRetalhoColumnToRetalhoUsadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retalho_usados', function (Blueprint $table) {
            $table->foreignId('id_retalho');

            $table->foreign('id_retalho')->references('id')->on('retalhos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retalho_usados', function (Blueprint $table) {
            //
        });
    }
}
