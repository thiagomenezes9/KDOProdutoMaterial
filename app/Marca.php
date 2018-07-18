<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = ['descricao'];


    public function produto(){
        return $this->hasMany('App\Produto','marca_id');
    }
}
