<?php

namespace App\Http\Controllers;

use App\Interesse;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteresseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $user = Auth::user();

        $interesses = Interesse::all()->where('user_id','=',$user->id);

        return view('Interesse.index',compact('interesses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function show($produto)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function edit(Interesse $interesse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interesse $interesse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interesse  $interesse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interesse $interesse)
    {
        //
    }


    public function adicionar($id){

        $produto = Produto::find($id);

        $interesse = new Interesse();

        $interesse->produto()->associate($produto);
        $interesse->user()->associate(Auth::user());

        $interesse->save();

        $result = "Alerta criado";




        return response()->json(json_encode($result));

        /*return redirect(url()->previous());*/

    }

    public function remover($id){



       foreach (Auth::user()->interesse as $interesse){
           if($interesse->produto->id == $id){
               $interesse->delete();
               break;
           }
       }




        $result = "Alerta criado";




        return response()->json(json_encode($result));

        /*return redirect(url()->previous());*/



    }


}
