@extends('layouts.app')

@section('htmlheader_title')
    Categoria
@endsection

@section('menu_titulo')
    Categoria
@endsection

@section('cardTitle')
    Categoria
@endsection

@section('cardContent')
    Detalhes da Categoria
@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('categorias.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

@endsection

@section('content')




                        <p><strong><h2>Categoria : {{$categoria->descricao}}</h2></strong></p><br>




@endsection