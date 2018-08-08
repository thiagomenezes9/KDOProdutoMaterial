@extends('layouts.buscaIndex')

@section('htmlheader_title')
    Busca
@endsection

@section('menu_titulo')
    Busca
@endsection

@section('cardTitle')
    Busca
@endsection

@section('cardContent')
    Listagem dos produtos encontrados

@endsection

@section('cardButton')


@endsection

@section('content')



    @forelse($produtos as $produto)


        <p style="display: none">{{$numSuper = '0'}}</p>
        <p style="display: none">{{$menorValor = '0'}}</p>




        @foreach($produto->preco as $preco)


            <p style="display: none">{{$numOferta = 0}}</p>

            @if($loop->first)
                <p style="display: none"> {{$menorValor = $preco->valor}}</p>
            @endif


            @foreach($produto->oferta as $oferta)
                @if($oferta->supermercado == $preco->supermercado)
                    @if($oferta->dt_fim >= \Carbon\Carbon::now() && $oferta->dt_ini <= \Carbon\Carbon::now())
                        @if($menorValor > $oferta->valor)

                            <p style="display: none">{{$menorValor = $oferta->valor}}</p>
                            <p style="display: none">{{$numOferta = $numOferta + 1}}</p>
                            <p style="display: none">{{$numSuper = $numSuper + 1}}</p>

                        @endif

                    @endif
                @endif
            @endforeach


            @if($numOferta == 0)

                @if($menorValor > $preco->valor)


                    <p style="display: none">{{$menorValor = $preco->valor}}</p>


                @endif



                <p style="display: none">{{$numSuper = $numSuper + 1}}</p>


            @endif






        @endforeach







        <ul class="products-list product-list-in-box" id="listProdutos">


            <li class="item" id="m{{$produto->marca->id}}">
                <div class="product-img">
                    @if($produto->foto)
                        <img src="{{$produto->foto}}" width="250px" height="250px" id="imagem">
                    @elseif(is_file('imgProdutos/'.$produto->cd_barras.'.jpg'))
                        <img src="{{URL::asset('imgProdutos/'.$produto->cd_barras.'.jpg')}}" width="250px"
                             height="250px" id="imagem">
                    @else
                        <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px"
                             id="imagem">
                    @endif
                </div>
                <div class="product-info">
                    <a href="{{route('busca.show',$produto->id)}}"
                       class="product-title">{{$produto->descricao}}


                        <span class="label label-success pull-right">Menor valor R$ {{$menorValor}}</span></a>
                    <span class="product-description">
                                              {{$produto->marca->descricao}}
                                             </span>

                    <strong><span class="product-description">
                                              Produto em {{$numSuper}} Estabelecimentos
                                             </span></strong>


                </div>
            </li>


        </ul>



    @empty

        <h3>Nenhum produto encontrado</h3>

    @endforelse



    {{$produtos->appends(array('termo' => $termo))->render()}}


@endsection


@section('filtro')




    <div class="radio">

        <label>Marca : </label><br>

        @foreach($marcas as $marca)

            <label>
                <input type="radio" name="rdMarca" id="rdMarca" value="{{$marca->id}}">
                {{$marca->descricao}}
            </label>
            <br>

        @endforeach


    </div>





    <div class="radio">


        <label>Categoria : </label><br>


        @if(count($categorias) === 1)
            @foreach($categorias as $categoria)

                <label>
                    <input type="radio" name="rdCategoria" id="rdCategoria" value="{{$categoria->id}}" checked>
                    {{$categoria->descricao}}
                </label>
                <br>
            @endforeach
        @else
            @foreach($categorias as $categoria)

                <label>
                    <input type="radio" name="rdCategoria" id="rdCategoria" value="{{$categoria->id}}">
                    {{$categoria->descricao}}
                </label>
                <br>
            @endforeach

        @endif


    </div>


@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {

            var $radiosMarca = $('input[name="rdMarca"]');
            var $radiosCategoria = $('input[name="rdCategoria"]');

            $radiosMarca.change(function () {
                var marca = $("input[name='rdMarca']:checked").val();
                var termo = $('termo');
                $.ajax({
                    type: 'GET',
                    url: "/busca",
                    data : {
                        "termo" : termo,
                        "marca" : marca

                    }

                })
            });


            $radiosCategoria.change(function () {
                var categoria = $("input[name='rdCategoria']:checked").val();
                alert("Selecionou categoria " + categoria);
            });


        });
    </script>
@endsection