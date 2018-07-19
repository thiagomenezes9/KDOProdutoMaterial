<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use App\Interesse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function listEstados($id)
    {
        $estados = Estado::select('id', 'nome')->where('pais_id','=',$id)->get();
        return response()->json(json_encode($estados));
    }

    public function listCidades($id)
    {
        $cidades = Cidade::select('id', 'nome')->where('estados_id','=',$id)->get();
        return response()->json(json_encode($cidades));
    }

    public function allCidades(){
        $cidades = Cidade::all();
        return response()->json(json_encode($cidades));
    }


    public function adicionar($produto){

        $interesse = new Interesse();

        $interesse->produto()->associate($produto);
        $interesse->user()->associate(Auth::user());

        $interesse->save();

        return response()->json('adicionou');

    }

    public function remover($id){

        $interesse = Interesse::find($id);



        $interesse->delete();


        return response()->json('removeu');



    }


}
