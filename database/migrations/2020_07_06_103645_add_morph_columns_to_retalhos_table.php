<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorphColumnsToRetalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retalhos', function (Blueprint $table) {
            $table->dropForeign('retalhos_id_user_foreign');
            $table->dropColumn('id_user');
            $table->unsignedBigInteger('retalhable_id');
            $table->string('retalhable_type');
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
            $table->foreignId('id_user')->default(1);
            $table->foreign('id_user')->references('id')->on('users');
            $table->dropColumn('retalhable_id');
            $table->dropColumn('retalhable_type');
        });
    }
}
