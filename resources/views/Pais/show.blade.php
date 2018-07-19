@extends('layouts.app')

@section('htmlheader_title')
Pais
@endsection

@section('menu_titulo')
Pais
@endsection

@section('cardTitle')
Pais
@endsection

@section('cardContent')
Detalhes do Pais

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('pais.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')



                        <p><strong><h2>Pais : {{$pais->nome}}</h2></strong></p><br>
                        <p><strong>Sigla : {{$pais->sigla}}</strong></p><br>
                        <h5>Bandeira : </h5> <br>

                        <img src="{{$pais->bandeira}}">



@endsection