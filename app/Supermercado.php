<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supermercado extends Model
{
    protected $fillable = ['nome','CNPJ', 'telefone','endereco','email','ativo','foto','cidade_id'];

    public function cidade(){
        return $this->belongsTo('App\Cidade');
    }

    public function preco(){
        return $this->hasMany('App\Preco','supermercado_id');

    }

    public function oferta(){
        return $this->hasMany('App\Oferta', 'supermercado_id');
    }

    public function user(){
        return $this->hasMany('App\User','supermercado_id');
    }

    public function segmento(){
        return $this->belongsTo('App\Segmento');
    }
}
