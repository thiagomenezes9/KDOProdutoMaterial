@extends('layouts.app')

@section('htmlheader_title')
Pais
@endsection

@section('menu_titulo')
Pais
@endsection

@section('cardTitle')
Pais
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('pais.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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

                        <form class="form-horizontal" action="{{action('PaisController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Pais" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="sigla" class="control-label" >Sigla</label>

                                    <input name="sigla" value="{{ old('sigla') }}" type="text" class="form-control input-lg"
                                           id="sigla" placeholder="Sigla do Pais" autofocus>

                            </div>


                            <br>
                            <br>
                            <legend>Bandeira</legend>


                            <div>
                                <div>
                                    <img id="img" style="width: 250px" src="../../assets/img/image_placeholder.jpg" alt="...">
                                </div>
                                <div>
                                    <br>
                                    <label class="btn btn-success">
                                        <i class="fa fa-cloud-upload"></i> Carregar
                                        <input style="display: none" type="file" id="bandeira" name="bandeira"/>
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
            $('#bandeira').change(function () {
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