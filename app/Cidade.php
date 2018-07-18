<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome','sigla','estados_id'];

    public function estado(){
        return $this->belongsTo('App\Estado','estados_id');
    }


    public function supermercado(){
        return $this->hasMany('App\Supermercado','cidade_id');
    }



    public function user(){
        return $this->hasMany('App\User','cidade_id');
    }
}
