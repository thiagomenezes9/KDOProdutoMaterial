@extends('layouts.app')

@section('htmlheader_title')
Cidade
@endsection

@section('menu_titulo')
Cidades
@endsection

@section('cardTitle')
Cidade
@endsection

@section('cardContent')
Detalhes da cidade

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('cidades.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')



                        <p><strong><h2>Nome : {{$cidade->nome}}</h2></strong></p>
                        <br>
                        <p><strong>Sigla : {{$cidade->sigla}}</strong></p><br>
                        <p><strong>Estado : {{$cidade->estado->nome}}</strong></p><br>



@endsection