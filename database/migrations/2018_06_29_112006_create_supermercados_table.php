<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupermercadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supermercados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('CNPJ');
            $table->string('telefone');
            $table->string('endereco');
            $table->string('email');
            $table->boolean('ativo');
            $table->binary('foto');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->integer('segmento_id')->unsigned();
            $table->foreign('segmento_id')->references('id')->on('segmentos');

            $table->timestamps();
        });

        Schema::table('supermercados', function(Blueprint $table){
            DB::statement('ALTER TABLE supermercados MODIFY foto LONGBLOB');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supermercados');
    }
}
