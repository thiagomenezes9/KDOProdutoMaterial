<?php

namespace App\Http\Controllers;

use App\Sugestao;
use Illuminate\Http\Request;

class SugestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sugestoes = Sugestao::all();
        return view('Sugestao.index',compact('sugestoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sugestao.create');
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

        $sugestao = new Sugestao();

        $sugestao->descricao = $request->descricao;
        $sugestao->marca = $request->marca;

        if(isset($request->foto)) {

            $arquivo = Input::file('foto');
            $form = $request->all();
            $form['foto'] = (string)Image::make($arquivo)->encode('data-url');
            $sugestao->foto= $form['foto'];
        }

        $sugestao->saveOrFail();

        return redirect('sugestao');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sugestao  $sugestao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sugestao = Sugestao::find($id);

        return view('Sugestao.show',compact('sugestao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sugestao  $sugestao
     * @return \Illuminate\Http\Response
     */
    public function edit(Sugestao $sugestao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sugestao  $sugestao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sugestao $sugestao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sugestao  $sugestao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sugestao = Sugestao::find($id);
        $sugestao->delete();
        return redirect('sugestao');
    }
}
