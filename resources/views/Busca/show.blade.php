@extends('layouts.app')

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
    Detalhes do produto buscado

@endsection

@section('cardButton')



    <div align="right">
        <div class="row">

            <p style="display: none">{{$valida = '0'}}</p>

            @foreach(Auth::user()->interesse as $interesse)

                @if($interesse->produto == $produto)

                    <p style="display: none">{{$valida = '1'}}</p>

                    <div align="right" class="col col-lg-2"><a href="{{route('InteresseRemover',$interesse->id)}}"
                                                               class="btn btn-danger
">Deixar</a></div>



                @endif

            @endforeach

            @if($valida == '0')
                <a href="{{route('InteresseAdicionar',$produto)}}"
                                                           class="btn btn-info">Interesse</a>
            @endif

            <div align="left" class="col col-lg-2">
                <a href="javascript:history.back()" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons">arrow_back</i>
                </a>
            </div>

        </div>



    </div>



@endsection

@section('content')







            <img src="{{$produto->foto}}" width="250px" height="250px" id="imagem" class="col-md-4">

            <p><strong><h2>Produto : {{$produto->descricao}}</h2></strong></p>
            <br>
            <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
            <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
            <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>


            {{-- <p><strong>Imagem : </strong></p><br>--}}


            <br><br><br><br>
            <h3><strong>Preços</strong></h3>

            <table class="table table-hover" id="tabPrecos">
                <thead>
                <tr>
                    <th class="col-md-6"><strong>Estabelecimento</strong></th>
                    <th align="center"><strong>Valor</strong></th>
                    <th align="center"><strong>Preço</strong></th>
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




@endsection


@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabPrecos').DataTable({
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
            });

        })
    </script>

@endsection