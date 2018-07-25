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



    <div align="left">
        <p style="display: none">{{$valida = '0'}}</p>

        <input type="hidden" id="Produto" name="Produto" value="{{$produto->id}}"/>

        @foreach(Auth::user()->interesse as $interesse)

            @if($interesse->produto == $produto)

                <p style="display: none">{{$valida = '1'}}</p>

               {{-- <a href="{{route('InteresseRemover',$interesse->id)}}"
                   class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons">close</i>
                </a>--}}


                <button id="btnRemover" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons">favorite</i>
                </button>


                <button id="btnAdicionar" class="btn btn-just-icon btn-white btn-fab btn-round" hidden >
                    <i class="material-icons">favorite_border</i>
                </button>
                @break;

            @endif

        @endforeach

        @if($valida == '0')
          {{--  <a href="{{route('InteresseAdicionar',$produto)}}" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons">add</i>
            </a>--}}

            <button id="btnRemover" class="btn btn-just-icon btn-white btn-fab btn-round" hidden>
                <i class="material-icons">favorite</i>
            </button>


            <button id="btnAdicionar" class="btn btn-just-icon btn-white btn-fab btn-round" >
                <i class="material-icons">favorite_border</i>
            </button>



        @endif


        <a href="javascript:history.back()" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">arrow_back</i>
        </a>


    </div>


@endsection

@section('content')





    <div class="row">

        <div class="col-md-3">
            @if($produto->foto)
                <img src="{{$produto->foto}}" width="250px" height="250px" id="imagem">
            @elseif(is_file('imgProdutos/'.$produto->cd_barras.'.jpg'))
                <img src="{{URL::asset('imgProdutos/'.$produto->cd_barras.'.jpg')}}"  width="250px" height="250px" id="imagem">
                @else
                <img src="{{URL::asset('assets/img/image_placeholder.jpg')}}" width="250px" height="250px" id="imagem">
            @endif
        </div>
        <div class="col-md-9">
            <h2><strong>Produto : {{$produto->descricao}}</strong></h2>
            <br>
            <p><strong>Código de Barras : </strong> {{$produto->cd_barras}}</p><br>
            <p><strong>Marca : </strong> {{$produto->marca->descricao}}</p><br>
            <p><strong>Categoria : </strong> {{$produto->categoria->descricao}}</p><br>
        </div>
    </div>
    {{-- <p><strong>Imagem : </strong></p><br>--}}



    @if($produto->preco->count() > 0 || $produto->oferta->count() > 0)


        <br><br><br>
        <h3><strong>Preços</strong></h3>

        <table class="table table-hover" id="tabPrecos">
            <thead>
            <tr>
                <th><strong>Estabelecimento</strong></th>
                <th><strong>Valor</strong></th>
                <th class="text-right"><strong>Preço</strong></th>
            </tr>
            </thead>


            <tbody>
            @foreach($produto->preco as $preco)

                <p style="display: none">{{$numOferta = 0}}</p>
                @foreach($produto->oferta as $oferta)
                    @if($oferta->supermercado == $preco->supermercado)
                        @if($oferta->dt_fim >= \Carbon\Carbon::now() && $oferta->dt_ini <= \Carbon\Carbon::now())
                            <tr style="background-color: #a3d7a5" align="center">
                                <td align="left"><a href="{{route('estabelecimentos.show',$oferta->supermercado->id)}}">{{ $oferta->supermercado->nome }}</a></td>
                                <td align="center">{{ 'R$'. $oferta->valor}}</td>
                                <td class="td-actions text-right">{{'Oferta até '.\Carbon\Carbon::parse($oferta->dt_fim)->format('d/m/Y')}}</td>

                            </tr>
                            <p style="display: none">{{$numOferta = $numOferta + 1}}</p>
                        @endif
                    @endif
                @endforeach
                @if($numOferta == 0)

                    <tr align="center">
                        <td align="left"><a
                                    href="{{route('estabelecimentos.show',$preco->supermercado->id)}}">{{ $preco->supermercado->nome }}</a>
                        </td>
                        <td align="center">{{ 'R$'. $preco->valor}}</td>
                        <td class="td-actions text-right">{{'Desde de '.\Carbon\Carbon::parse($preco->created_at)->format('d/m/Y')}}</td>


                    </tr>

                @endif
            @endforeach
            </tbody>
        </table>
    @else



            <input type="hidden" id="produto" name="produto" value="{{$produto->id}}"/>

            <div class="box-footer">
                <button type="submit" id="btnAviso" class="btn btn-success pull-right btn-lg">
                    Avise-Me
                </button>

            </div>





    @endif



@endsection


@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#btnAviso').click(function () {


                var vProduto = $('#produto').val();

                $.get('../../alerta/'+vProduto, function (result) {

                    alert('Alerta criado com sucesso');
                })


            })

            $('#btnAdicionar').click(function () {
                var Produto = $('#Produto').val();
                $.get('../../interesse/adicionar/'+Produto,function (result) {

                    $('#btnAdicionar').attr('hidden', 'hidden');
                    $('#btnRemover').removeAttr('hidden');
                    alert('Interesse Adicionado');

                })
            })

            $('#btnRemover').click(function () {

                var Produto = $('#Produto').val();
                $.get('../../interesse/remover/'+Produto,function (result) {
                    $('#btnRemover').attr('hidden', 'hidden');
                    $('#btnAdicionar').removeAttr('hidden');

                    alert('Interesse Removido');

                })
            })

        })
    </script>





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