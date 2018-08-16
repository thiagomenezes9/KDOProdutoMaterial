<?php

namespace App\Http\Controllers;

use App\Interesse;
use App\Mail\CampanhaNotificacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CampanhaController extends Controller
{

    public function campanha(){

        return view('campanha.index');
    }


    public function index(Request $request){


        if(strcmp($request->input('campanha'), "all")==0){


            $usuarios = User::all();

            $titulo = $request->titulo;
            $conteudo = $request->conteudo;


            foreach ($usuarios as $usuario){
                Mail::to($usuario)->send(new CampanhaNotificacao($titulo, $conteudo));
            }

            return redirect('campanhas')->with('mensagem','Campanha enviada');
        }

        if(strcmp($request->input('campanha'), "allHomem")==0){

        }



    }
}
