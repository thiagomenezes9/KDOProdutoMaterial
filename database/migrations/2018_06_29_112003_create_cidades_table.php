<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->string('sigla');
            $table->integer('estados_id')->unsigned();
            $table->foreign('estados_id')->references('id')->on('estados')->onDelete('cascade');
        });


        DB::table('cidades')->insert(
            array(
                'nome' => 'Jataí',
                'sigla' => 'JTI',
                'estados_id'=>'1'

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
        Schema::dropIfExists('cidades');
    }
}
