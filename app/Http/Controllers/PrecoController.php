<?php

namespace App\Http\Controllers;

use App\Aviso;
use App\Mail\AvisoNotificacao;
use App\Mail\EmailNotificacao;
use App\Preco;
use App\Produto;
use App\Supermercado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PrecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();

//        $precos = Preco::all()->where('ativo','=','1');
        $precos = Preco::all();

        if($usuario->tipo == 'LOJA'){
            $precos = Preco::all()->where('supermercado_id','=',$usuario->supermercado_id);
//                                    ->where('ativo','=','1');




        }

        return view('Precos.index',compact('precos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::all();
        $supermercados = Supermercado::all();
        return view('Precos.create',compact('produtos','supermercados'));
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
            'valor' => 'required',
            'produto' => 'required',
            'supermercado' =>'required',

        ]);

        $valor = floatval($request->valor);


        $produto = Produto::where('descricao',$request->produto)->get();
        $supermercado = Supermercado::find($request->supermercado);


        $precoAntigo = Preco::all();


        foreach ($precoAntigo as $precoAnt){
//            if($precoAnt->ativo == 1){
                if($precoAnt->supermercado->id === $supermercado->id){
                    if($precoAnt->produto->id === $produto[0]->id){
//                        $precoAnt->ativo = 0;
//                        $precoAnt->save();

                        $precoAnt->delete();

                    }

                }

//            }


        }




        $preco = new Preco();


        $preco->valor = $valor;

        $preco->supermercado()->associate($supermercado);
        $preco->produto()->associate($produto[0]);

        $preco->save();


        $avisos = Aviso::all();

        foreach ($avisos as $aviso){
            if($aviso->produto->id == $preco->produto->id){
                $usuario = User::find($aviso->user->id);
                Mail::to($usuario)->send(new AvisoNotificacao($aviso->produto->id,$preco->id));
            }
        }


        return redirect('precos');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function show(Preco $preco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $preco = Preco::find($id);

        return view('Precos.edit',compact('preco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'valor' => 'required'


        ]);

        $precoOld = Preco::find($id);

//        $precoOld->ativo = '0';

//        $precoOld->save();


        $valor = floatval($request->valor);

        $produto = Produto::find($precoOld->produto_id);
        $supermercado = Supermercado::find($request->supermercado);



        $precoOld->delete();

        $preco = new Preco();


        $preco->valor = $valor;

        $preco->supermercado()->associate($supermercado);
        $preco->produto()->associate($produto);

        $preco->save();

        return redirect('precos');


        /**
         * Apos mudar preço,verificar se preço novo e menor que preço atual
         * se for mandar email para usuarios que tenha interresse no produto
         *
         *
         */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preco  $preco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preco = Preco::find($id);

//        $preco->ativo = '0';
//
//        $preco->save();


        $preco->delete();
        return redirect('precos');
    }
}
