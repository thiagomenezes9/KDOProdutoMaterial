@extends('layouts.app')

@section('htmlheader_title')
Segmentos
@endsection

@section('menu_titulo')
Segmentos
@endsection

@section('cardTitle')
Segmentos
@endsection

@section('cardContent')
Detalhes do Segmento

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('segmentos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>



@endsection

@section('content')




    <h2> <strong>Segmento : {{$segmento->descricao}}</strong></h2>




@endsection