<?php

namespace App\Http\Controllers;

use App\Interesse;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    public function index(Request $request){


        if(strcmp($request->input('campanha'), "")==0){

            $interesses = Interesse::all()->groupBy('produto_id');

            $pdf = PDF::loadView('relatorio.interesse',compact('interesses'));


            return $pdf->stream();
        }

        if(strcmp($request->input('relatorio'), "ProdutoAcesso")==0){

            $acessos = DB::select(DB::raw("SELECT produto_id, COUNT(produto_id) AS qtd_acessos FROM acessos
               
                GROUP BY  produto_id    ORDER BY qtd_acessos DESC" ));




            $pdf = PDF::loadView('relatorio.acesso',compact('acessos'));


            return $pdf->stream();
        }


        if(strcmp($request->input('relatorio'), "ProdutoAlerta")==0){

            $alertas = DB::select(DB::raw("SELECT produto_id, COUNT(produto_id) AS qtd_alerta FROM avisos
               
                GROUP BY  produto_id    ORDER BY qtd_alerta DESC" ));




            $pdf = PDF::loadView('relatorio.alerta',compact('alertas'));


            return $pdf->stream();
        }




    }
}
