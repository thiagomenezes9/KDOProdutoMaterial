@extends('layouts.app')

@section('htmlheader_title')
Usuários
@endsection

@section('menu_titulo')
Usuários
@endsection

@section('cardTitle')
Usuários
@endsection

@section('cardContent')
    Detalhes do Usuário

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('usuarios.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>



@endsection

@section('content')




                        <p><strong><h2>Nome : {{$usuario->name}}</h2></strong></p>
                        <br>
                        <p><strong>Email : </strong>{{$usuario->email}}</p><br>
                        <p><strong>Data Nascimento : </strong>{{\Carbon\Carbon::parse($usuario->dt_nasc)->format('d/m/Y')}}</p><br>
                        <p><strong>Sexo : </strong>{{$usuario->sexo}}</p><br>
                        <p><strong>Ativo : </strong>{{$usuario->ativo ? 'Sim' : 'Não'}}</p><br>

                        <p><strong>CPF :</strong> {{$usuario->cpf}}</p><br>
                        <p><strong>Telefone : </strong>{{$usuario->telefone}}</p><br>
                        <p><strong>Tipo : </strong>{{$usuario->tipo}}</p><br>


                        @if($usuario->cidade)
                        <p><strong>cidade : </strong>{{$usuario->cidade->nome}}</p><br>

                        @endif

                        @if($usuario->tipo === 'LOJA')
                            <p><strong>Estabelecimento : </strong>{{$usuario->supermercado->nome}}</p><br>
                        @endif




                        @if(isset($usuario->foto))

                            <p><strong>Foto Perfil : </strong></p><br>
                            <img src="{{$usuario->foto}}" width="100%" height="100%" id="imagem">
                        @endif



@endsection