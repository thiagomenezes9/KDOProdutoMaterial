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




                <div class="info-box">
                    <a href="{{route('busca.show',$oferta->produto->id)}}">
                                                <span class="info-box-icon"><img src="{{$oferta->produto->foto}}"
                                                                                 alt="Product Image"
                                                                                 class="imagem"></span>
                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">{{$oferta->produto->descricao}}</span>
                        <span class="info-box-number">R$ {{$oferta->valor}}</span>
                        <span class="info-box-text"><small>{{$oferta->supermercado->nome}}</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->





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


