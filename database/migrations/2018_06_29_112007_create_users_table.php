<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('dt_nasc')->nullable();
            $table->binary('foto')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->boolean('ativo');
            $table->string('tipo');
            $table->string('sexo');
            $table->integer('cidade_id')->unsigned()->nullable();
            $table->foreign('cidade_id')->references('id')->on('cidades');

            $table->integer('supermercado_id')->unsigned()->nullable();
            $table->foreign('supermercado_id')->references('id')->on('supermercados');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function(Blueprint $table){
            DB::statement('ALTER TABLE users MODIFY foto LONGBLOB');
        });


        DB::table('users')->insert(
            array(
                'email' => 'thiagomenezes9@gmail.com',
                'name' => 'admin',
                'password' => '$2y$10$GGYmnhv6.JtHUuDseuYlq.z1TlzMCymB1TVwjlifN4CtlrwG861sK',
                'ativo' => '1',
                'tipo' => 'ADMIN',
                'sexo' => 'Masculino'

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
        Schema::dropIfExists('users');
    }
}
