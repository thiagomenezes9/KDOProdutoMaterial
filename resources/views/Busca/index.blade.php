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



    <div id="conteudo">



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







        <ul class="products-list product-list-in-box" >


            <li class="item">
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
        </div>


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





        @if(count($categorias) !== 1)
            <label>Categoria : </label><br>
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




            $radiosMarca.change(function () {
                var marca = $("input[name='rdMarca']:checked").val();
                var termo = queryString("termo");

                $('#conteudo').empty();

                $.ajax({
                    url: '../../buscamarca/' + marca,
                    type: 'GET',
                    dataType: 'json',
                    data : {termo:termo},
                    success: function (json) {

                    $.each(JSON.parse(json), function (i, obj) {
                        var html_code = "<ul class='products-list product-list-in-box' >" ;

                        html_code+= "<li class='item'>";

                        html_code+= "<div class='product-img'>";
                        html_code+= "<img src='' width='250px' height='250px' id='"+obj.cdBarras+"'> </div>"



                        html_code+=  "                <div class='product-info'>";
                        html_code+="                    <a href='http://www.kdoproduto.com.br/busca/"+obj.id+"' class='product-title'> "+obj.descricao ;
                        html_code+= "                        <span id='menor"+obj.id+"' class='label label-success pull-right'>Menor valor R$   </span></a>" ;
                        html_code+="                    <span class='product-description'>\n" ;
                        html_code+="     "+obj.descmarca+"" ;
                        html_code+="                                             </span>" ;
                        html_code+="                    <strong><span id='qtd"+obj.id+"' class='product-description'>Produto em Estabelecimentos</span></strong>" ;
                        html_code+="                </div>" ;
                        html_code+="            </li>" ;
                        html_code+="        </ul>";



                        $('#conteudo').append(html_code);
                        is_img(obj.cdBarras);
                        menorValor(obj.id);
                    });

                }
                })



            });


        });





        function menorValor(id) {
            $.ajax({
                url: '../../menorValor/' + id,
                type: 'GET',
                dataType: 'json',
                success: function (json) {

                    $.each(JSON.parse(json), function (i, obj) {
                        $('#qtd'+id).text('Produto em '+obj.qtd+' Estabelecimentos');
                        if(obj.menor === null){
                            $('#menor'+id).text('Menor Valor R$ 0');


                        }else{
                            $('#menor'+id).text('Menor Valor R$'+obj.menor);

                        }


                    });
                }
            });
        }



        function is_img(cdBarras) {
            var img = document.createElement('img');
            img.src = "http://www.kdoproduto.com.br/imgProdutos/"+cdBarras+".jpg";

            img.onload = function() {

                $('#'+cdBarras).attr("src","http://www.kdoproduto.com.br/imgProdutos/"+cdBarras+".jpg")


            }
            img.onerror = function() {
                $('#'+cdBarras).attr("src","http://www.kdoproduto.com.br/assets/img/image_placeholder.jpg")

            }

        }



        function queryString(parameter) {
            var loc = location.search.substring(1, location.search.length);
            var param_value = false;
            var params = loc.split("&");
            for (i=0; i<params.length;i++) {
                param_name = params[i].substring(0,params[i].indexOf('='));
                if (param_name == parameter) {
                    param_value = params[i].substring(params[i].indexOf('=')+1)
                }
            }
            if (param_value) {
                return param_value;
            }
            else {
                return false;
            }
        }
    </script>
@endsection