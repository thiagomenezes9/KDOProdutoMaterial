@extends('layouts.app')

@section('htmlheader_title')
Estados
@endsection

@section('menu_titulo')
Estados
@endsection

@section('cardTitle')
Estados
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('estados.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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





                        <form class="form-horizontal" action="{{action('EstadoController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Estado" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="sigla" class="control-label" >Sigla</label>

                                    <input name="sigla" value="{{ old('sigla') }}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla do Estado" autofocus>

                            </div>

                            <div class="form-group">
                                <label for="pais" class="control-label">Pais</label>

                                    <select name="pais" id="pais" class="form-control">
                                      @foreach($pais as $p)
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach
                                    </select>




                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>



@endsection