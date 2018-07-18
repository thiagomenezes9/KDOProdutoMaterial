<?php

namespace App\Http\Controllers;

use App\Acesso;
use App\Interesse;
use App\Oferta;
use App\Pais;
use App\Publicacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){


        //ver os 10 produtos com oferta
        //e ou ver os 10 produtos com mais acessos
        //e ou ver os 10 produtos com mais interesses

        $ofertas = Oferta::where('dt_fim','>=',Carbon::now())
                        ->where('dt_ini','<=',Carbon::now())->get();





        return view('dashboard',compact('ofertas'));
    }




    public function perfil(){
        $usuario = Auth::user();
        $pais = Pais::all();




        return view('user.perfil',compact('usuario','pais'));
    }


}
