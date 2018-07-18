<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Pais;
use App\Supermercado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->where('name', '<>', 'admin');

        return view('user.index',compact('usuarios'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);

        return view('user.show',compact('usuario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $pais = Pais::all();
        $supermercados = Supermercado::all();
        return view('user.edit',compact('usuario','pais','supermercados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {




        $usuario = User::find($id);




        $this->validate($request, [
            'dt_nasc' => 'required'


        ]);



        if(isset($request->foto)) {

            $arquivo = Input::file('foto');
            $form = $request->all();
            $form['foto'] = (string)Image::make($arquivo)->resize(300,300)->encode('data-url');
            $usuario->foto= $form['foto'];
        }


       $usuario->name = $request->name;
       $usuario->email = $request->email;
       $usuario->telefone = $request->telefone;
       $usuario->cpf = $request->cpf;
       $usuario->dt_nasc = $request->dt_nasc;
       $usuario->sexo = $request->sexo;
       $usuario->ativo = $request->ativo;




        if(isset($request->cidade)){
            $cidade = Cidade::find($request->cidade);


            $usuario->cidade()->associate($cidade);

        }

/*
        if($usuario->tipo == 'LOJA'){

            $supermercado = Supermercado::find($usuario->supermercado->id);

            $supermercado->name = $request->name;
            $supermercado->email = $request->email;
            $supermercado->telefone = $request->telefone;
            $supermercado->CNPJ = $request->cpf;
            $supermercado->dt_nasc = $request->dt_nasc;


            $supermercado->save();

        }*/

        if(isset($request->supermercado)){
            $supermercado = Supermercado::find($request->supermercado);

            $usuario->tipo = 'LOJA';
            $usuario->supermercado()->associate($supermercado);

        }

        $usuario->save();

        return redirect('dashboard');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
