@extends('layouts.app')

@section('htmlheader_title')
    Marcca
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







                        <form class="form-horizontal" action="{{action('MarcaController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="descricao" class="col-sm-2 control-label" >Descrição</label>
                                <div class="col-sm-10">
                                    <input name="descricao" value="{{ old('descricao') }}" type="text" class="form-control input-lg"
                                           id="descricao" placeholder="Informe a marca" autofocus>
                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>

                    </div>


@endsection