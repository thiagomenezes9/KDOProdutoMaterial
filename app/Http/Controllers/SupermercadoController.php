<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Pais;
use App\Segmento;
use App\Supermercado;
use Illuminate\Http\Request;

class SupermercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supermercados = Supermercado::all();

        return view('Estabelecimento.index',compact('supermercados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all();
        $segmentos = Segmento::all();
        return view('Estabelecimento.create',compact('pais','segmentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email'=>'required',
            'telefone'=>'required',
            'endereco'=>'required',
            'cidades'=>'required',
            'segmento' =>'required'

        ]);


        $segmento = Segmento::find($request->segmento);



        $cidade = Cidade::find($request->cidades);


        $supermercado = new Supermercado;


        $supermercado->nome = $request->nome;
        $supermercado->CNPJ = $request->CNPJ;
        $supermercado->telefone = $request->telefone;
        $supermercado->email = $request->email;
        $supermercado->endereco = $request->endereco;
        $supermercado->ativo = $request->ativo;

        $supermercado->cidade()->associate($cidade);
        $supermercado->segmento()->associate($segmento);






            if(isset($request->foto)) {

                $arquivo = Input::file('foto');
                $form = $request->all();
                $form['foto'] = (string)Image::make($arquivo)->encode('data-url');
                $supermercado->foto= $form['foto'];
            }

            $supermercado->save();

            return redirect('estabelecimentos');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supermercado  $supermercado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $supermercado = Supermercado::find($id);
        return view('Estabelecimento.show',compact('supermercado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supermercado  $supermercado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $supermercado = Supermercado::find($id);


        $pais = Pais::all();


        $segmentos = Segmento::all();
        return view('Estabelecimento.edit',compact('supermercado','pais','segmentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supermercado  $supermercado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supermercado $supermercado)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email'=>'required',
            'telefone'=>'required',
            'endereco'=>'required',
            'cidades'=>'required'

        ]);


        $segmento = Segmento::find($request->segmento);


        $cidade = Cidade::find($request->cidades);



        $supermercado->nome = $request->nome;
        $supermercado->CNPJ = $request->CNPJ;
        $supermercado->telefone = $request->telefone;
        $supermercado->email = $request->email;
        $supermercado->endereco = $request->endereco;
        $supermercado->ativo = $request->ativo;

        $supermercado->cidade()->associate($cidade);
        $supermercado->segmento()->associate($segmento);






        if(isset($request->foto)) {

            $arquivo = Input::file('foto');
            $form = $request->all();
            $form['foto'] = (string)Image::make($arquivo)->encode('data-url');
            $supermercado->foto= $form['foto'];
        }

        $supermercado->save();

        return redirect('estabelecimentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supermercado  $supermercado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supermercado $supermercado)
    {
        //
    }
}
