<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Preco extends Model
{
    use SoftDeletes;


    protected $fillable = ['valor','supermercado_id','produto_id'];

    protected $dates = ['deleted_at'];


    public function supermercado(){
        return $this->belongsTo('App\Supermercado');
    }

    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}
