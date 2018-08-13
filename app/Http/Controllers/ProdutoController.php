<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo == 'ADMIN'){
            $produtos = Produto::paginate(50);
            return view('Produtos.index',compact('produtos'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('Produtos.create',compact('marcas','categorias'));
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
            'descricao' => 'required',
            'cd_barras' => 'required',

            'marca' =>'required',
            'categoria'=>'required'

        ]);

        $produto = new Produto;

        $produto->descricao = $request->descricao;
        $produto->cd_barras = $request->cd_barras;

        $marca = Marca::where('descricao',$request->marca)->get();
        $categoria = Categoria::where('descricao',$request->categoria)->get();




        $produto->categoria()->associate($categoria[0]);
        $produto->marca()->associate($marca[0]);

//        $marca->produto()->associate($produto);
//        $categoria->produto()->associate($produto);




        if($request->foto){

            $arquivo = Input::file('foto');
            $form = $request->all();
    //            $form['imagem'] = (string) Image::make($arquivo)->encode('data-url');
            $form['foto'] = (string) Image::make($arquivo)->resize(1200,600)->encode('data-url');
            $produto->foto = $form['foto'];
        }
        $produto->saveOrFail();


        return redirect('produtos');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('Produtos.show',compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {

        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('Produtos.edit',compact('produto','marcas','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $this->validate($request, [
            'descricao' => 'required',
            'cd_barras' => 'required',
            'foto' =>'required',
            'marca' =>'required',
            'categoria'=>'required'

        ]);



        $produto->descricao = $request->descricao;
        $produto->cd_barras = $request->cd_barras;

        $marca = Marca::where('descricao',$request->marca)->get();
        $categoria = Categoria::where('descricao',$request->categoria)->get();




        $produto->categoria()->associate($categoria[0]);
        $produto->marca()->associate($marca[0]);



        $arquivo = Input::file('foto');
        $form = $request->all();
//            $form['imagem'] = (string) Image::make($arquivo)->encode('data-url');
        $form['foto'] = (string) Image::make($arquivo)->resize(1200,600)->encode('data-url');
        $produto->foto = $form['foto'];

        $produto->saveOrFail();


        return redirect('produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect('produtos');
    }
}
