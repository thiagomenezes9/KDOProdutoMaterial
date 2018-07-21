<?php

namespace App\Http\Controllers;

use App\Acesso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        /**
         * Buscar quantidade de acesso do usuario em cada produto
         * na hora de mostrar mostro quantas vezes ele acessou
         */

        $acessos = DB::select(DB::raw("SELECT produto_id, COUNT(produto_id) AS qtd_acessos FROM acessos
               WHERE user_id = ".$user->id."
                GROUP BY  produto_id    ORDER BY qtd_acessos DESC" ));



        return view('Acesso.index',compact('acessos'));
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
