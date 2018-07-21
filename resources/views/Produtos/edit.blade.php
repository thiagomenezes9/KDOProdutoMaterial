@extends('layouts.app')

@section('htmlheader_title')
    Produtos
@endsection

@section('menu_titulo')
    Produtos
@endsection

@section('cardTitle')
    Produtos
@endsection

@section('cardContent')
    Preencha todos os campos

@endsection

@section('cardButton')

    <div align="right">
        <a href="{{route('produtos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
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


                        <form class="form-horizontal" action="{{route('produtos.update',$produto)}}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PUT">

                            {{csrf_field()}}



                            <div class="form-group">
                                <label for="descricao" class="control-label" >Descrição</label>

                                    <input name="descricao" value="{{ $produto->descricao}}" type="text" class="form-control input-lg"
                                           id="descricao"  autofocus>

                            </div>


                            <div class="form-group">
                                <label for="cd_barras" class="control-label" >Código de Barras</label>

                                    <input name="cd_barras" value="{{ $produto->cd_barras }}" type="number" class="form-control input-lg"
                                              id="cd_barras"  autofocus></input>

                            </div>


                            <div class="form-group">
                                <label for="marca" class="control-label">Marca</label>

                                    <input list="marca" name="marca" class="form-control">
                                    <datalist id="marca">

                                        @foreach($marcas as $marca)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$marca->descricao}}" {{$marca->descricao === $produto->marca->descricao ? 'selected' : ''}}>{{$marca->descricao}}</option>

                                        @endforeach
                                    </datalist>



                            </div>


                            <div class="form-group">
                                <label for="categoria" class="control-label">Categoria</label>

                                    <input list="categoria" name="categoria" class="form-control">
                                    <datalist id="categoria">

                                        @foreach($categorias as $categoria)
                                            {{--                                            <option value="{{$c->id}}" {{ $membro['id'] === (isset($coordenacao->responsavel) ? $coordenacao->responsavel: '' ) ? 'selected' : '' }}>{{$membro['name']}}</option>--}}
                                            <option value="{{$categoria->descricao}}" {{$categoria->descricao === $produto->categoria->descricao ? 'selected' : ''}}>{{$categoria->descricao}}</option>

                                        @endforeach
                                    </datalist>


                            </div>


                            <br>
                            <br>
                            <legend>Foto</legend>

                            <div class="fileinput fileinput-new">
                                <div class="fileinput-new thumbnail">
                                    @if(isset($produto->foto))

                                        <img id="img" style="width: 150px" src="{{$produto->foto}}" alt="../assets/img/faces/avatar.jpg">
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


@endsection