@extends('layouts.app')

@section('htmlheader_title')
Estados
@endsection

@section('menu_titulo')
Estados
@endsection

@section('cardTitle')
Estados
@endsection

@section('cardContent')
Detalhes do Estado

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('estados.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')




                        <p><strong><h2>Nome : {{$estado->nome}}</h2></strong></p><br>
                        <p><strong>Sigla : {{$estado->sigla}}</strong></p><br>
                        <p><strong>Pais : {{$estado->pais->nome}}</strong></p><br>




@endsection