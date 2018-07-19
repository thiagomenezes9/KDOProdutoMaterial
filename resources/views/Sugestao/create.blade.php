@extends('layouts.app')

@section('htmlheader_title')
Sugestões
@endsection

@section('menu_titulo')
Sugestões
@endsection

@section('cardTitle')
Sugestões
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('sugestao.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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



                        <form class="form-horizontal" action="{{action('SugestaoController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="descricao" class="control-label" >Descrição</label>

                                    <input name="descricao" value="{{ old('descricao') }}" type="text" class="form-control input-lg"
                                           id="descricao" placeholder="Informe a descricao" autofocus>

                            </div>

                            <div class="form-group">
                                <label for="marca" class="control-label" >Marca</label>

                                    <input name="marca" value="{{ old('marca') }}" type="text" class="form-control input-lg"
                                           id="marca" placeholder="Informe a marca" autofocus>

                            </div>


                            <br>
                            <br>
                            <legend>Foto</legend>

                            <div>
                                <div>
                                    <img id="img" style="width: 250px" src="../../assets/img/image_placeholder.jpg" alt="...">
                                </div>
                                <div>
                                    <br>
                                    <label class="btn btn-success">
                                        <i class="fa fa-cloud-upload"></i> Carregar
                                        <input style="display: none" type="file" id="foto" name="foto"/>
                                    </label>

                                </div>
                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">
                                    Salvar</button>

                            </div>



                        </form>


@endsection


@section('scriptlocal')

    <script>
        $(function () {
            $('#foto').change(function () {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()
                fileReader.onloadend = function () {
                    $('#img').attr('src', fileReader.result)
                }
                fileReader.readAsDataURL(file)
            })
        })

    </script>

    @endsection