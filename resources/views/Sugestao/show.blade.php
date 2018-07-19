@extends('layouts.app')

@section('htmlheader_title')
Sugestões
@endsection

@section('menu_titulo')
Sugestões
@endsection

@section('cardTitle')
Sugestões
@endsection

@section('cardContent')
Detalhes da Sugestão

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('sugestao.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')



                        <p><strong><h2>Produto : {{$sugestao->descricao}}</h2></strong></p><br>
                        <p><strong><h2>Marca : {{$sugestao->marca}}</h2></strong></p><br>

                        @if(isset($sugestao->foto))

                            <p><strong>Foto : </strong></p><br>
                            <img src="{{$sugestao->foto}}" width="100%" height="100%" id="imagem">
                        @endif




@endsection