@extends('layouts.app')

@section('htmlheader_title')
Estabelecimentos
@endsection

@section('menu_titulo')
Estabelecimentos
@endsection

@section('cardTitle')
Estabelecimentos
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('estabelecimentos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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



                        <form class="form-horizontal" action="{{action('SupermercadoController@store')}}" method="post" enctype="multipart/form-data">

                            <!-- 'nome', 'sigla',
                                'bandeira' -->

                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" value="1" name="ativo" id="ativo" >



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="nome" value="{{ old('nome') }}" type="text" class="form-control input-lg"
                                           id="nome"  autofocus>

                            </div>


                            <div class="form-group">
                                <label for="email" class="control-label" >E-mail</label>

                                    <input name="email" value="{{old('email')}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="telefone" class="control-label" >Telefone </label>

                                    <input name="telefone" value="{{old('telefone')}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="CNPJ" class="control-label" >CNPJ </label>

                                    <input name="CNPJ" value="{{old('CNPJ')}}" type="text" class="form-control input-lg"
                                           id="CNPJ"  autofocus>

                            </div>


                            <div class="form-group">
                                <label for="nome" class="control-label" >Endereco</label>

                                    <input name="endereco" value="{{ old('endereco') }}" type="text" class="form-control input-lg"
                                           id="endereco"  autofocus>

                            </div>






                            <div class="form-group">
                                <label for="pais" class="control-label" >Pais : </label>

                                    <select name="pais" id="pais" class="form-control">
                                        <option id="paisOp">Selecione o pais</option>
                                        @foreach($pais as $p)
                                            <option value="{{$p->id}}">{{$p->nome}}</option>
                                        @endforeach
                                    </select>

                            </div>

                            <div class="form-group">
                                <label for="estados" class="control-label" >Estados : </label>

                                    <select name="estados" id="estados" class="form-control" disabled>

                                        <option>Selecione o pais</option>

                                    </select>

                            </div>

                            <div class="form-group">
                                <label for="cidades" class="control-label" >Cidades : </label>

                                    <select name="cidades" id="cidades" class="form-control" disabled>

                                        <option >Selecione o Estado</option>

                                    </select>

                            </div>


                            <div class="form-group">
                                <label for="segmento" class="control-label">Segmento</label>

                                    <select name="segmento" id="segmento" class="form-control">

                                        @foreach($segmentos as $segmento)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$segmento->id}}">{{$segmento->descricao}}</option>

                                        @endforeach
                                    </select>



                            </div>





                           {{-- <div class="form-group">
                                <label for="foto" class="control-label">Foto</label>
                                <input name="foto" type="file" class="form-control-file"
                                       id="foto" autofocus>
                            </div>--}}

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



   {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('.phone_with_ddd').mask('(00) 0000-0000');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.CNPJ').mask('00.000.000/0000-00', {reverse: true});
            $('.valor').mask('000000000000000.00', {reverse: true});
        });
    </script>
--}}

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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#pais').click(function () {
                $.ajax({
                    url:'../../listEstados/'+$('#pais').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#estados').find('option').remove();
                        $('#cidades').find('option').remove();
                        $('#estados').removeAttr('disabled');
                        $('#pais').find('#paisOp').remove();
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#estados').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })

            $('#estados').click(function () {
                $.ajax({
                    url:'../../listCidades/'+$('#estados').val(),
                    type:'GET',
                    dataType:'json',
                    success: function (json) {
                        $('#cidades').find('option').remove();
                        $('#cidades').removeAttr('disabled');
                        $.each(JSON.parse(json), function (i, obj) {
                            $('#cidades').append($('<option>').text(obj.nome).attr('value', obj.id));
                        })
                    }
                })
            })
        })
    </script>
@endsection