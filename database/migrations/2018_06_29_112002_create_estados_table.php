<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('sigla');
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
        });


        DB::table('estados')->insert(
            array(
                'nome' => 'Goiás',
                'sigla' => 'GO',
                'pais_id'=>'1'

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
}
