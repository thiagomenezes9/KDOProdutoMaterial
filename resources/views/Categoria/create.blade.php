@extends('layouts.app')

@section('htmlheader_title')
    Categoria
@endsection

@section('menu_titulo')
    Categoria
@endsection

@section('cardTitle')
    Categorias
@endsection

@section('cardContent')
    Preencha todos os campos
@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('categorias.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>

@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>


            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>







        </div>
    @endif



                        <form class="form-horizontal" action="{{action('CategoriaController@store')}}" method="post" enctype="multipart/form-data">


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group label-floating">
                                <label for="descricao" class="control-label" >Descrição</label>

                                    <input name="descricao" value="{{ old('descricao') }}" type="text" class="form-control input-lg"
                                           id="descricao" placeholder="Informe a categoria..." autofocus>

                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>


@endsection