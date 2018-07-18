<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugestao extends Model
{
    protected $fillable = ['descricao','marca', 'foto'];
}
