<?php

namespace App;

use App\Notifications\ResetSenhaNotificacao;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dt_nasc','foto','cpf','telefone','ativo','tipo','sexo','cidade_id','supermercado_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function cidade(){
        return $this->belongsTo('App\Cidade','cidade_id');
    }

    public function supermercado(){
        return $this->belongsTo('App\Supermercado');
    }


    public function interesse(){
        return $this->hasMany('App\Interesse','user_id');

    }

    public function acesso(){
        return $this->hasMany('App\Acesso','user_id');
    }

    public function aviso(){
        return $this->hasMany('App\Aviso','user_id');
    }



    public function termo(){
        return $this->hasMany('App\Termo','user_id');
    }


    public function sendPasswordResetNotification($token){
        $this->notify(new ResetSenhaNotificacao($token));
    }

}
