<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->string('cd_barras');
            //$table->string('marca');
            $table->binary('foto');
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            //$table->unsignedInteger('categoria_id');




            $table->timestamps();
        });

        Schema::table('produtos', function(Blueprint $table){
            DB::statement('ALTER TABLE produtos MODIFY foto LONGBLOB');
        });

        //Schema::table('produtos', function(Blueprint $table){
        //  $table->foreign('categoria_id')->references('id')->on('cotegorias');
        //});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
