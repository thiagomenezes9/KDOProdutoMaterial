<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nome','sigla','pais_id'];

    public function pais(){
        return $this->belongsTo('App\Pais','pais_id');
    }

    public function cidades()
    {
        return $this->hasMany('App\Cidade','estados_id');
    }
}
