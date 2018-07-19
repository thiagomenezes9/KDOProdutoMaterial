@extends('layouts.app')

@section('htmlheader_title')
    Marca
@endsection

@section('menu_titulo')
    Marca
@endsection

@section('cardTitle')
    Marcas
@endsection

@section('cardContent')
    Preencha todos os campos
@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('marcas.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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



                        <form class="form-horizontal" action="{{route('marcas.update',$marca->id)}}" method="post" enctype="multipart/form-data">

                         <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="descricao" class="control-label" >Descrição</label>

                                    <input name="descricao" value="{{ $marca->descricao }}" type="text" class="form-control input-lg"
                                           id="descricao" placeholder="Marca" autofocus>

                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Save</button>

                            </div>



                        </form>



@endsection