<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segmento extends Model
{
    protected $fillable = ['descricao'];


    public function produto(){
        return $this->hasMany('App\Supermercado','segmento_id');
    }
}
