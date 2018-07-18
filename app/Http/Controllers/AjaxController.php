<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

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

}
