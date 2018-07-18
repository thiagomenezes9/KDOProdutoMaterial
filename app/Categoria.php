<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descricao'];


    public function produto(){
        return $this->hasMany('App\Produto','categoria_id');
    }
}
