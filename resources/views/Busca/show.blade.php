@extends('layouts.app')

@section('htmlheader_title')
    Produtos
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Produtos
@stop


@section('main-content')



    @if (Session::get('fail'))
        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Atenção</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            </div>
        </div>
    @endif



    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes do Produto</h3><br><br>

                        <div class="row">

                            <p style="display: none">{{$valida = '0'}}</p>

                            @foreach(Auth::user()->interesse as $interesse)

                                @if($interesse->produto == $produto)

                                    <p style="display: none">{{$valida = '1'}}</p>

                                    <div align="right" class="col col-lg-2"><a href="{{route('InteresseRemover',$interesse->id)}}" class="btn btn-danger
">Deixar</a></div>



                                @endif

                            @endforeach

                            @if($valida == '0')
                                <div align="right" class="col col-lg-2"><a href="{{route('InteresseAdicionar',$produto)}}" class="btn btn-info">Interesse</a></div>
                            @endif

                                <div align="left" class="col col-lg-2"><a href="javascript:history.back()" class="btn btn-info">Voltar</a></div>

                        </div>
                    </div>

                    <div class="box-body">


                        <img src="{{$produto->foto}}" width="250px" height="250px" id="imagem" class="col-md-4">

                        <p><strong><h2>Produto : {{$produto->descricao}}</h2></strong></p><br>
                        <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
                        <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
                        <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>



                       {{-- <p><strong>Imagem : </strong></p><br>--}}



                        <br><br><br><br><h3><strong>Preços</strong></h3>

                        <table class="table table-hover" id="tabPrecos">
                            <thead>
                            <tr>
                                <td class="col-md-6"><strong>Estabelecimento</strong></td>
                                <td align="center"><strong>Valor</strong></td>
                                <td align="center"><strong>Preço</strong></td>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($produto->preco as $preco)

                                <p style="display: none">{{$numOferta = 0}}</p>
                                @foreach($produto->oferta as $oferta)
                                    @if($oferta->supermercado == $preco->supermercado)
                                        @if($oferta->dt_fim >= \Carbon\Carbon::now() && $oferta->dt_ini <= \Carbon\Carbon::now())
                                            <tr style="background-color: #3f729b" align="center">
                                                <td align="left">{{ $oferta->supermercado->nome }}</td>
                                                <td align="right">{{ 'R$'. $oferta->valor}}</td>
                                                <td align="left">{{'Oferta até '.\Carbon\Carbon::parse($oferta->dt_fim)->format('d/m/Y')}}</td>

                                            </tr>
                                            <p style="display: none">{{$numOferta = $numOferta + 1}}</p>
                                        @endif
                                     @endif
                                    @endforeach
                                @if($numOferta == 0)

                                    <tr align="center">
                                        <td align="left">{{ $preco->supermercado->nome }}</td>
                                        <td align="right">{{ 'R$'. $preco->valor}}</td>
                                        <td align="left">{{'Desde de '.\Carbon\Carbon::parse($preco->created_at)->format('d/m/Y')}}</td>


                                    </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>




                    </div>



                </div>
            </div>
        </div>
    </div>


@endsection


@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabPrecos').DataTable( {
                "language": {
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próxima"
                    },
                    "sSearch": "<span>Pesquisar</span> _INPUT_", //search
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Não há resultados para esta busca",
                    "info": "Exibindo página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrado de _MAX_ registros)"

                }
            } );

        })
    </script>

@endsection