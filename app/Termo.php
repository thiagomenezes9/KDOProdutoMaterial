<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termo extends Model
{
    protected $fillable = ['termo','data','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
