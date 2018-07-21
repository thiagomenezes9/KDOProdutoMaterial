@extends('layouts.app')

@section('htmlheader_title')
Usuários
@endsection

@section('menu_titulo')
Usuários
@endsection

@section('cardTitle')
Usuários
@endsection

@section('cardContent')
Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('usuarios.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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


                        <form class="form-horizontal" action="{{route('usuarios.update',$usuario->id)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">


                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="name" value="{{ $usuario->name }}" type="text" class="form-control input-lg"
                                           id="name" placeholder="Nome do Usuário" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="email" class="control-label" >E-mail</label>

                                    <input name="email" value="{{$usuario->email}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="telefone" class="control-label" >Telefone </label>

                                    <input name="telefone" value="{{$usuario->telefone}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="cpf" class="control-label" >CPF </label>

                                    <input name="cpf" value="{{$usuario->cpf}}" type="text" class="form-control input-lg"
                                           id="cpf"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="dt_nasc" class="control-label" >Data Nascimento</label>




                                    <input placeholder="00/00/0000" name="dt_nasc" value="{{date('Y-m-d',strtotime($usuario->dt_nasc))}}" type="date" class="form-control input-lg"
                                           id="dt_nasc">

                            </div>



                            <div class="form-group">
                                <label for="sexo" class="control-label">Sexo</label>

                                    <select name="sexo" id="sexo" class="form-control">

                                        <option value="Masculino" {{$usuario->sexo == 'Masculino' ? 'selected': '' }}>Masculino</option>
                                        <option value="Feminino" {{$usuario->sexo == 'Feminino' ? 'selected':''}}>Feminino</option>

                                    </select>




                            </div>


                            <div class="form-group">
                                <label for="pais" class="control-label" >Pais : </label>

                                    <select name="pais" id="pais" class="form-control">
                                        <option id="paisOp">Selecione o pais</option>
                                        @foreach($pais as $p)
                                            <option value="{{$p->id}}" {{$usuario->cidade->estado->pais->id == $p->id ? 'selected':''}}>{{$p->nome}}</option>
                                        @endforeach
                                    </select>

                            </div>

                            <div class="form-group">
                                <label for="estados" class="control-label" >Estados : </label>

                                    <select name="estados" id="estados" class="form-control" disabled>

                                        <option>{{$usuario->cidade->estado->nome}}</option>
                                        <option>Selecione o pais</option>

                                    </select>

                            </div>

                            <div class="form-group">
                                <label for="cidades" class="control-label" >Cidades : </label>

                                    <select name="cidades" id="cidades" class="form-control" disabled>

                                        <option>{{$usuario->cidade->nome}}</option>

                                        <option >Selecione o Estado</option>

                                    </select>

                            </div>







                            <div class="form-group">
                                <label for="ativo" class="control-label">Status</label>

                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$usuario->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$usuario->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>


                            </div>

                            <div class="form-group">
                                <label for="supermercado" class="control-label">Estabelecimento</label>

                                    <select name="supermercado" id="supermercado" class="form-control">
                                        @foreach($supermercados as $supermercado)
                                            <option value="{{$supermercado->id}}">{{$supermercado->nome}}</option>
                                        @endforeach

                                    </select>

                            </div>


                            <br>
                            <br>
                            <legend>Foto</legend>

                            <div class="fileinput fileinput-new">
                                <div class="fileinput-new thumbnail">
                                    @if(isset($usuario->foto))

                                        <img id="img" style="width: 150px" src="{{$usuario->foto}}" alt="../assets/img/faces/avatar.jpg">
                                    @else
                                        <img id="img" style="width: 150px" src="../../assets/img/default-avatar.png" alt="...">
                                    @endif
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