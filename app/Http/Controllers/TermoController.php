<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Termo;
use Illuminate\Http\Request;

class TermoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::find('1');
        return view('Busca.index',compact('produto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function show(Termo $termo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function edit(Termo $termo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Termo $termo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Termo  $termo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termo $termo)
    {
        //
    }
}
