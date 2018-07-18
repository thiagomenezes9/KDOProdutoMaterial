<?php

namespace App\Http\Controllers;

use App\Segmento;
use Illuminate\Http\Request;

class SegmentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $segmentos = Segmento::all();
        return view('Segmento.index',compact('segmentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Segmento.create');
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
            'descricao' => 'required'

        ]);

        $segmento = new Segmento();

        $segmento->descricao = $request->descricao;
        $segmento->saveOrFail();

        return redirect('segmentos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Segmento  $segmento
     * @return \Illuminate\Http\Response
     */
    public function show(Segmento $segmento)
    {
        return view('Segmento.show',compact('segmento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Segmento  $segmento
     * @return \Illuminate\Http\Response
     */
    public function edit(Segmento $segmento)
    {
        return view('Segmento.edit',compact('segmento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Segmento  $segmento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'descricao' => 'required'

        ]);

        $segmento = Segmento::findOrFail($id);

        $segmento->descricao = $request->descricao;
        $segmento->saveOrFail();

        return redirect('segmentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Segmento  $segmento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $segmento = Segmento::findOrFail($id);
        $segmento->delete();
        return redirect('segmentos');
    }
}
