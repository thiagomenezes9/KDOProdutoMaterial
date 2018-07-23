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
Detalhes do Produto

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('produtos.index')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>


@endsection

@section('content')





                        <h2><strong>Produto : {{$produto->descricao}}</strong></h2><br>
                        <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
                        <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
                        <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>



                            <p><strong>Imagem : </strong></p><br>

                        @if($produto->foto)
                            <img src="{{$produto->foto}}" width="250px" height="250px" id="imagem">
                        @elseif(is_file('imgProdutos/'.$produto->cd_barras.'.jpg'))
                            <img src="{{URL::asset('imgProdutos/'.$produto->cd_barras.'.jpg')}}"  width="250px" height="250px" id="imagem">
                        @else
                            <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px" id="imagem">
                        @endif




@endsection

@section('scriptlocal')

    <script type="text/javascript">
        $(document).ready(function () {

            $("#imagem").bind('mouseover', function () {

                $(this).animate({height: "500px", width: "500px"});

            })
            $("#imagem").bind('mouseout', function () {

                $(this).animate({height: "250px", width: "250px"});

            })
        })
    </script>

    <style>
        textarea {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

@endsection