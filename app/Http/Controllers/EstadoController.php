<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Pais;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all();
        return view('estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pais = Pais::all();


        return view('estado.create',compact('pais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado;

        $estado->nome = $request->nome;
        $estado->sigla = $request->sigla;

        $pais = Pais::findOrFail($request->pais);

        $estado->pais()->associate($pais);

        $estado->saveOrFail();


        return redirect('estados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::findOrFail($id);

        return view('estado.show',compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::findOrFail($id);

        $pais = Pais::all();

        return view('estado.edit',compact('estado','pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);


        $pais = Pais::findOrFail($request->pais);

        $estado->pais()->associate($pais);


        $estado->update($request->all());


        $estado->save();


        return redirect('estados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);

        $estado->delete();


        //  Session::flash('mensagem', 'Contato deletado com sucesso!');

        return redirect('estados');
    }
}
