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



                        <form class="form-horizontal" action="{{route('precos.update',$preco->id)}}" method="post" enctype="multipart/form-data" >


                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                            <input type="hidden" name="supermercado" value="{{$preco->supermercado_id}}"/>

                            <input type="hidden" name="_method" value="PUT">







                            <div class="form-group">
                                <label for="produto" class="control-label" >Produto</label>

                                    <input name="produto" value="{{ $preco->produto->descricao }}" type="text" class="form-control input-lg"
                                           id="produto" autofocus disabled>

                            </div>



                            <div class="form-group">
                                <label for="valor" class="control-label" >Valor</label>

                                    <input name="valor" value="{{$preco->valor }}" type="text" class="form-control input-lg valor"
                                           id="valor" placeholder="valor" autofocus>

                            </div>





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