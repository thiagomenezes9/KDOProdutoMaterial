@extends('layouts.app')

@section('htmlheader_title')
Estabelecimentos
@endsection

@section('menu_titulo')
Estabelecimentos
@endsection

@section('cardTitle')
Estabelecimentos
@endsection

@section('cardContent')
Detalhes do Estabelecimento

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('estabelecimentos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>



@endsection

@section('content')




                        <p><strong><h2>Nome : {{$supermercado->nome}}</h2></strong></p>
                        <br>
                        <p><strong>Email : </strong>{{$supermercado->email}}</p><br>

                        <p><strong>Ativo : </strong>{{$supermercado->ativo ? 'Sim' : 'Não'}}</p><br>

                        <p><strong>CNPJ :</strong> {{$supermercado->CNPJ}}</p><br>
                        <p><strong>Telefone : </strong>{{$supermercado->telefone}}</p><br>
                        <p><strong>Endereço : </strong>{{$supermercado->endereco}}</p><br>
                        <p><strong>Segmento : </strong>{{$supermercado->segmento->descricao}}</p><br>


                        @if($supermercado->cidade)
                            <p><strong>cidade : </strong>{{$supermercado->cidade->nome}}</p><br>

                        @endif


                        @if(isset($supermercado->foto))

                            <p><strong>Foto Perfil : </strong></p><br>
                            <img src="{{$supermercado->foto}}" width="100%" height="100%" id="imagem">
                        @endif



@endsection