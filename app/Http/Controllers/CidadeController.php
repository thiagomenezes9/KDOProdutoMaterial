<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::all();
        return view('Cidade.index',compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::all();


        return view('Cidade.create',compact('estado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade;

        $cidade->nome = $request->nome;
        $cidade->sigla = $request->sigla;

        $estado = Estado::findOrFail($request->estado);

        $cidade->estado()->associate($estado);

        $cidade->saveOrFail();


        return redirect('cidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = Cidade::findOrFail($id);

        return view('Cidade.show',compact('cidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);

        $estado = Estado::all();

        return view('Cidade.edit',compact('cidade','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);


        $estado = Estado::findOrFail($request->estado);

        $cidade->estado()->associate($estado);


        $cidade->update($request->all());


        $cidade->save();


        return redirect('cidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade = Cidade::findOrFail($id);

        $cidade->delete();


        //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        return redirect('estados');
    }
}
