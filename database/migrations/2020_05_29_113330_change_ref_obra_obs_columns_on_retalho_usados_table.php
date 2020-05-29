<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRefObraObsColumnsOnRetalhoUsadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retalho_usados', function (Blueprint $table) {
            $table->string('ref_obra', 40)->nullable()->change();
            $table->text('obs')->nullable()->change();
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
