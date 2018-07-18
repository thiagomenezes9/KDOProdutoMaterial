<?php

namespace App\Http\Controllers;

use App\Interesse;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;



class RelatorioController extends Controller
{
    public function index(Request $request){


        if(strcmp($request->input('relatorio'), "ProdutoInteresse")==0){

            $interesses = Interesse::all();




            $pdf = PDF::loadView('relatorio.interesse',compact('interesses'));


            return $pdf->stream();
        }


       /* if(strcmp($request->input('relatorio'), "QtdAcessoPeriodo")==0){
            if(($request->input('dataInicial')==null) || ($request->input('dataFinal')) == null){
                Session::flash('mensagem', 'Preencha os campos corretamente');
                return redirect('/relatorios');
            }else{
                $dtInicial = \DateTime::createFromFormat('Y-m-d', $request->input('dataInicial'));
                $dtIni = $dtInicial->format('Y-m-d');
                $dtFinal = \DateTime::createFromFormat('Y-m-d', $request->input('dataFinal'));
                $dtFim = $dtFinal->format('Y-m-d');

                $dti = $dtInicial->format('d-m-Y');
                $dtf = $dtFinal->format('d-m-Y');
                $stringData = $dti.' - '.$dtf;


                $marmitas = DB::select(DB::raw("SELECT COUNT(Marmita.codigo) as quantidade, SUM(Marmita.valor_vendido) as total 
FROM Pedido INNER JOIN Marmita ON (Pedido.codigo = Marmita.cod_pedido) WHERE Pedido.status = 'Finalizado' AND DATE(Pedido.data_pedido) BETWEEN '". $dtIni."' AND '".$dtFim."'"));


                $pdf = PDF::loadView('relatorio.marmitasPeriodo', compact('marmitas'), compact('stringData'));
                return $pdf->stream();

            }
        }*/

    }


    public function exibirOpcoesRelatorio(){
        return view('relatorio.index');
    }


}
