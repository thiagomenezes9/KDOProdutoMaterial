@extends('layouts.app')

@section('htmlheader_title')
    Preços
@endsection

@section('menu_titulo')
    Preços
@endsection

@section('cardTitle')
    Preços
@endsection

@section('cardContent')
    Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right">
        <a href="{{route('precos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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




                        <form class="form-horizontal" action="{{route('precos.store')}}" method="post" enctype="multipart/form-data" >


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>







                            <div class="form-group">
                                <label for="produto" class="control-label">Produto</label>

                                    <input list="produto" name="produto" class="form-control">
                                    <datalist id="produto">

                                        @foreach($produtos as $produto)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$produto->descricao}}">{{$produto->descricao}}</option>

                                        @endforeach
                                    </datalist>



                            </div>



                            <div class="form-group">
                                <label for="valor" class="control-label" >Valor</label>

                                    <input name="valor" value="{{ old('valor') }}" type="text"  class="form-control input-lg valor"
                                           id="valor" placeholder="valor" autofocus></input>

                            </div>



                            @if(Auth::user()->tipo == 'LOJA')

                                <input type="hidden" name="supermercado" value="{{Auth::user()->supermercado_id}}"/>





                            @endif



                            @if(Auth::user()->tipo == 'ADMIN')

                                <div class="form-group">
                                    <label for="produto" class="control-label">Estabelecimento</label>

                                        {{--<input list="supermercado" name="supermercado">--}}
                                        <select id="supermercado" name="supermercado" class="form-control">

                                            @foreach($supermercados as $supermercado)
                                                {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                                <option value="{{$supermercado->id}}">{{$supermercado->nome}}</option>

                                            @endforeach
                                        </select>



                                </div>





                            @endif






                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>



@endsection


@section('scriptlocal')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(document).ready(function(){

    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.valor').mask('000000000000000.00', {reverse: true});
    });
    </script>

@endsection