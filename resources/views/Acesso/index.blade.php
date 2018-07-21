@extends('layouts.app')

@section('htmlheader_title')
    Acessos
@endsection

@section('menu_titulo')
    Acessos
@endsection

@section('cardTitle')
    Acessos
@endsection

@section('cardContent')
    Produtos Acessados
@endsection

@section('content')

    @if(isset($acessos))



        @foreach($acessos as $acesso)



                    <ul class="products-list product-list-in-box">


                        <li class="item">
                            <div class="product-img">
                                <img src="{{\App\Produto::find($acesso->produto_id)->foto}}" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="{{route('busca.show',$acesso->produto_id)}}"
                                   class="product-title">{{\App\Produto::find($acesso->produto_id)->descricao}}


                                </a>
                                <span class="product-description">
                                              {{\App\Produto::find($acesso->produto_id)->marca->descricao}}
                                             </span>


                                <strong><span class="product-description">
                                              Numero de Acessos {{$acesso->qtd_acessos}}
                                             </span></strong>


                            </div>
                        </li>


                    </ul>








            @endforeach






    @else
        <h1>Sem Acessos</h1>
    @endif
@endsection

@section('scriptlocal')

    <style>
        .imagem {

            width: 100px;
            height: 100px;
        }


    </style>



@endsection


