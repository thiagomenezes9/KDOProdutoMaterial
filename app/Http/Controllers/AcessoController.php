<?php

namespace App\Http\Controllers;

use App\Acesso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Acesso  $acesso
     * @return \Illuminate\Http\Response
     */
    public function show(Acesso $acesso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acesso  $acesso
     * @return \Illuminate\Http\Response
     */
    public function edit(Acesso $acesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acesso  $acesso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acesso $acesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acesso  $acesso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acesso $acesso)
    {
        //
    }

    public static function adicionar($produto){

        $acesso = new Acesso();

        $acesso->produto()->associate($produto);
        $acesso->user()->associate(Auth::user());

        $acesso->data = Carbon::now();

        $acesso->save();

        return 1;

    }

}
