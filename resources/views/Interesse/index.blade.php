@extends('layouts.app')

@section('htmlheader_title')
Interesse
@endsection

@section('menu_titulo')
Interesse
@endsection

@section('cardTitle')
Interesse
@endsection

@section('cardContent')
Lista dos produtos com Interesse

@endsection

@section('cardButton')



@endsection

@section('content')




                        @foreach($interesses as $interesse)


                            <p style="display: none">{{$numSuper = '0'}}</p>
                            <p style="display: none">{{$menorValor = '0'}}</p>




                            @foreach($interesse->produto->preco as $preco)

                                <p style="display: none">{{$numOferta = 0}}</p>

                                @if($loop->first)
                                    <p style="display: none"> {{$menorValor = $preco->valor}}</p>
                                @endif

                                @foreach($interesse->produto->oferta as $oferta)
                                    @if($oferta->supermercado == $preco->supermercado)
                                        @if($oferta->dt_fim >= \Carbon\Carbon::now())
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


                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-img">
                                        @if($interesse->produto->foto)
                                            <img src="{{$interesse->produto->foto}}" width="250px" height="250px" id="imagem">
                                        @elseif(is_file('imgProdutos/'.$interesse->produto->cd_barras.'.jpg'))
                                            <img src="{{URL::asset('imgProdutos/'.$interesse->produto->cd_barras.'.jpg')}}"  width="250px" height="250px" id="imagem">
                                        @else
                                            <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px" id="imagem">
                                        @endif
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('busca.show',$interesse->produto->id)}}"
                                           class="product-title">{{$interesse->produto->descricao}}


                                            <span class="label label-success pull-right">Menor valor R$ {{$menorValor}}</span></a>


                                        <a href="{{route('InteresseRemover',$interesse->id)}}" class="product-title">


                                            <span class="label label-danger pull-right">Deixar</span></a>

                                        <span class="product-description">
                                              {{$interesse->produto->marca->descricao}}
                                             </span>


                                        <strong><span class="product-description">
                                              Produto em {{$numSuper}} Estabelecimentos
                                             </span></strong>


                                    </div>
                                </li>


                            </ul>






                        @endforeach




@endsection
