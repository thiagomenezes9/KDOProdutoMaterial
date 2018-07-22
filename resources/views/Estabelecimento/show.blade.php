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
        <a href="javascript:history.back()" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>



@endsection

@section('content')




    <div class="row">

        <div class="col-md-3">
            @if(isset($supermercado->foto))
                <img src="{{$supermercado->foto}}" width="250px" height="250px" id="imagem">
                @else
                <img id="img" style="width: 150px" src="../../assets/img/default-avatar.png" alt="...">
            @endif
        </div>
        <div class="col-md-9">
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

        </div>
    </div>










@endsection