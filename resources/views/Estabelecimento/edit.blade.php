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


                        <form class="form-horizontal" action="{{route('estabelecimentos.update',$supermercado)}}" method="post" enctype="multipart/form-data">

                         <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="nome" class="control-label" >Nome</label>

                                    <input name="nome" value="{{ $supermercado->nome }}" type="text" class="form-control input-lg"
                                           id="nome" placeholder="Nome do Usuário" autofocus>

                            </div>


                            <div class="form-group">
                                <label for="email" class="control-label" >E-mail</label>

                                    <input name="email" value="{{$supermercado->email}}" type="email" class="form-control input-lg"
                                           id="email"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="telefone" class="control-label" >Telefone </label>

                                    <input name="telefone" value="{{$supermercado->telefone}}" type="tel" class="form-control input-lg"
                                           id="telefone"  autofocus>

                            </div>

                            <div class="form-group">
                                <label for="CNPJ" class="control-label" >CNPJ </label>

                                    <input name="CNPJ" value="{{$supermercado->CNPJ}}" type="text" class="form-control input-lg"
                                           id="CNPJ"  autofocus>

                            </div>


                            <div class="form-group">
                                <label for="endereco" class="control-label" >Endereco</label>

                                    <input name="endereco" value="{{ $supermercado->endereco }}" type="text" class="form-control input-lg"
                                           id="endereco" placeholder="Endereço..." autofocus>

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
                                <label for="status" class="control-label">Status</label>

                                    <select name="ativo" id="ativo" class="form-control">
                                        <option value="1" {{$supermercado->ativo == '1' ? "selected" : ""}}>Ativado</option>
                                        <option value="0" {{$supermercado->ativo == '0' ? "selected" : ""}}>Desativado</option>

                                    </select>


                            </div>



                            <div class="form-group">
                                <label for="segmento" class="control-label">Segmento</label>

                                    <select name="segmento" id="segmento" class="form-control">

                                        @foreach($segmentos as $segmento)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$segmento->id}}"{{$supermercado->segmento->id == $segmento->id ? "selected" : ""}}>{{$segmento->descricao}}</option>

                                        @endforeach
                                    </select>



                            </div>


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