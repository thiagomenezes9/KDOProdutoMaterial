@extends('layouts.app')

@section('htmlheader_title')
    Campanhas
@endsection

@section('menu_titulo')
    Campanhas
@endsection

@section('cardTitle')
    Campanhas
@endsection

@section('cardContent')
    Campanhas

@endsection

@section('cardButton')


@endsection

@section('content')



    @if (Session::has('mensagem'))
        <div class="alert alert-info">{{ Session::get('mensagem') }}</div>
    @endif

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


                        <form class="form-horizontal" action="{{action('CampanhaController@index')}}" method="post">
                            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <fieldset>
                                <legend>Campanha destinada para : </legend>

                                <div class="form-group">
                                    <label for="campanha" class="control-label" >Opção</label>
                                    <div class="col-md-11">
                                        <select class="form-control " name="campanha" id="campanha">
                                            <option value="all">Todos usuarios</option>
                                            <option value="allHomem">Todos os Homens</option>
                                            <option value="allMulher">Todas as Mulheres</option>
                                            <option value="ProdutoAcesso">Idade entre 18-35</option>
                                            <option value="ProdutoAcesso">Idade entre 36-50</option>

                                        </select>
                                    </div>
                                </div>

                            </fieldset>


                            <div class="form-group">
                                <label for="titulo" class="control-label" >Titulo</label>

                                <input name="titulo" value="{{ old('titulo') }}" type="text" class="form-control input-lg"
                                       id="titulo" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="conteudo" class="control-label" >Conteudo</label>

                                <textarea name="conteudo"  class="form-control input-lg"
                                          id="conteudo" autofocus></textarea>

                            </div>





                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">Enviar Camapanha</button>
                                {{--<a href="{{route('funcionario.index')}}" class="btn btn-small btn-primary pull-left btn-lg" style="float: right">--}}
                                {{--Voltar--}}
                                {{--</a>--}}
                            </div>

                        </form>


@endsection
@section('scriptlocal')
  {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

    <script type="text/javascript">


        $(document).ready(function() {
            $('#summernote').summernote({
                // placeholder: 'Hello stand alone ui',
                //tabsize: 2,
                // height: 100,
                // lang: 'pt-br',
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true
            });

        });

    </script>
--}}


@endsection