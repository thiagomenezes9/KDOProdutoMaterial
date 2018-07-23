<?php

namespace App\Http\Controllers;

use App\Aviso;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AvisoController extends Controller
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






    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function show(Aviso $aviso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function edit(Aviso $aviso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aviso $aviso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aviso  $aviso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aviso $aviso)
    {
        //
    }


    public function criar($id){



        $produto = Produto::find($id);
        $user = Auth::user();
        $avisos = Aviso::all()->where('produto_id','=',$produto->id)->whereIn('user_id',$user->id);



        if($avisos->isEmpty()){
            $aviso = new Aviso();



            $aviso->produto()->associate($produto);
            $aviso->user()->associate(Auth::user());


            $aviso->save();






        }

        $result = "Alerta criado";




        return response()->json(json_encode($result));

    }
}
