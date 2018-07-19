@extends('layouts.app')

@section('htmlheader_title')
Cidades
@endsection

@section('menu_titulo')
Cidades
@endsection

@section('cardTitle')
Cidade
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('cidades.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')

    @if($errors->any())
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa errada</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>
    @endif





                        <form class="form-horizontal" action="{{route('cidades.update',$cidade->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="nome" value="{{ $cidade->nome }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome da cidade" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="sigla" class="control-label" >Sigla</label>

                                    <input name="sigla" value="{{$cidade->sigla}}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla da cidade" autofocus>

                            </div>

                            <div class="form-group">
                                <label for="pais" class="control-label">Estado</label>

                                    <select name="estado" id="estado" class="form-control">
                                        @foreach($estado as $e)
                                            <option value="{{$e->id}}" {{ $e->id === (isset($cidade->estado_id) ? $cidade->estado_id : '' ) ? 'selected' : '' }}>{{$e->nome}}</option>
                                        @endforeach
                                    </select>


                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>



@endsection