<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSugestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugestaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            $table->string('marca');

            $table->binary('foto');

            $table->timestamps();
        });

        Schema::table('sugestaos', function(Blueprint $table){
            DB::statement('ALTER TABLE sugestaos MODIFY foto LONGBLOB');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sugestaos');
    }
}
