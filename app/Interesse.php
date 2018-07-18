<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    protected $fillable = ['produto_id','user_id'];

    public function produto(){
        return $this->belongsTo('App\Produto');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
