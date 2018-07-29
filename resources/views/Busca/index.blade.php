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



                            {{--@if(isset($produto->preco))--}}




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
                                                <img src="{{URL::asset('imgProdutos/'.$produto->cd_barras.'.jpg')}}"  width="250px" height="250px" id="imagem">
                                            @else
                                                <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px" id="imagem">
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







                            {{--@endif--}}



                        @empty

                            <h3>Nenhum produto encontrado</h3>

                        @endforelse



                    {{$produtos->appends(array('termo' => $termo))->render()}}


@endsection


@section('filtro')


    <div class="form-group">
        <label for="marca" class="control-label" >Marca : </label>

        <select name="marca" id="marca" class="form-control">
            <option id="marcaOp">Marca...</option>
            @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->descricao}}</option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="categoria" class="control-label" >Categoria : </label>

        <select name="categoria" id="categoria" class="form-control">
            <option id="categoriaOp">Categoria...</option>
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
            @endforeach

        </select>

    </div>


@endsection

@section('scriptlocal')


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