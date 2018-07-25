@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('menu_titulo')
    Home
@endsection

@section('cardTitle')
    Ofertas
@endsection

@section('cardContent')
    Ofertas validas apartir de hoje
@endsection

@section('content')
    @if(isset($ofertas))



        @foreach($ofertas as $oferta)




            <ul class="products-list product-list-in-box">


                <li class="item">
                    <div class="product-img">
                        @if($oferta->produto->foto)
                            <img src="{{$oferta->produto->foto}}" width="250px" height="250px" id="imagem">
                        @elseif(is_file('imgProdutos/'.$oferta->produto->cd_barras.'.jpg'))
                            <img src="{{URL::asset('imgProdutos/'.$oferta->produto->cd_barras.'.jpg')}}"  width="250px" height="250px" id="imagem">
                        @else
                            <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px" id="imagem">
                        @endif
                    </div>
                    <div class="product-info">
                        <a href="{{route('busca.show',$oferta->produto->id)}}"
                           class="product-title">{{$oferta->produto->descricao}}


                            <span class="label label-success pull-right">Valor da Oferta R$ {{$oferta->valor}}</span></a>
                        <span class="product-description">
                                              {{$oferta->produto->marca->descricao}}
                                             </span>

                        <strong><span class="product-description">
                                              {{$oferta->supermercado->nome}}
                                             </span></strong>


                        <strong><span class="product-description">
                                              Oferta valida até {{\Carbon\Carbon::parse($oferta->dt_fim)->format('d/m/Y')}}
                                             </span></strong>


                    </div>
                </li>


            </ul>



        @endforeach





    @else
        <h1>Sem Ofertas</h1>
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


