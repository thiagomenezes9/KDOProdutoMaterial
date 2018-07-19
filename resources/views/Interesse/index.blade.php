@extends('layouts.app')

@section('htmlheader_title')
    Interesses
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Lista dos Interesses
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Interesses</h3>

                    </div>

                    <div class="box-body">


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
                                        <img src="{{$interesse->produto->foto}}" alt="Product Image">
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


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scriptlocal')



@endsection