<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropNumOfColumnFromRetalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retalhos', function (Blueprint $table) {
            $table->dropColumn('num_of');
            $table->string('num_lote')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retalhos', function (Blueprint $table) {
            //
        });
    }
}
