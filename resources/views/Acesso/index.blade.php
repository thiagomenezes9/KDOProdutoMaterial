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



            @if($acesso->user_id == Auth::user()->id)

            <ul class="products-list product-list-in-box">


                <li class="item">
                    <div class="product-img">
                        <img src="{{$acesso->produto->foto}}" alt="Product Image">
                    </div>
                    <div class="product-info">
                        <a href="{{route('busca.show',$acesso->produto->id)}}"
                           class="product-title">{{$acesso->produto->descricao}}


                            </a>
                        <span class="product-description">
                                              {{$acesso->produto->marca->descricao}}
                                             </span>




                        <strong><span class="product-description">
                                              Acessado em {{\Carbon\Carbon::parse($acesso->data)->format('d/m/Y')}}
                                             </span></strong>


                    </div>
                </li>


            </ul>

@endif








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


