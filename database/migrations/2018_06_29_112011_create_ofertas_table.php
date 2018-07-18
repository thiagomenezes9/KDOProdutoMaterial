<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->increments('id');
            $table->double('valor');
            $table->integer('supermercado_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->dateTime('dt_ini');
            $table->dateTime('dt_fim');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('supermercado_id')->references('id')->on('supermercados');
            $table->foreign('produto_id')->references('id')->on('produtos');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
