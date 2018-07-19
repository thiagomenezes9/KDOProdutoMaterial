@extends('layouts.app')

@section('htmlheader_title')
Ofertas
@endsection

@section('menu_titulo')
Ofertas
@endsection

@section('cardTitle')
Ofertas
@endsection

@section('cardContent')
Listagem das Ofertas

@endsection

@section('cardButton')



    <div align="right" >
        <a href="{{route('ofertas.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">add</i>
        </a>
    </div>

@endsection

@section('content')

<div class="table-responsive">

                        <table class="table table-striped table-no-bordered table-hover" id="tabOferta">
                            <thead>
                            <tr>
                                <th><strong>Descrição</strong></th>
                                <th><strong>Marca</strong></th>
                                <th><strong>Estabelecimento</strong></th>
                                <th><strong>Inicio</strong></th>
                                <th><strong>Fim</strong></th>
                                <th><strong>Valor</strong></th>
                                <th class="disabled-sorting text-right"><strong>Ações</strong></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($ofertas as $oferta)
                                <tr align="center">
                                    <td align="left">{{ $oferta->produto->descricao }}</td>
                                    <td align="left">{{ $oferta->produto->marca->descricao }}</td>
                                    <td align="left">{{ $oferta->supermercado->nome }}</td>
                                    <td align="left">{{ \Carbon\Carbon::parse($oferta->dt_ini)->format('d/m/Y') }}</td>
                                    <td align="left">{{ \Carbon\Carbon::parse($oferta->dt_fim)->format('d/m/Y') }}</td>
                                    <td align="left">{{ $oferta->valor }}</td>
                                    <td class="td-actions text-right">


                                        <a  href="{{route('ofertas.edit',$oferta->id)}}" >
                                            <i class="material-icons">edit</i>

                                        </a>

                                        <a  data-toggle="modal" href="#myModal{{ $oferta->id }}" >
                                            <i class="material-icons">close</i>

                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $oferta->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$oferta->produto->descricao}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $oferta->id }}"
                                                              action="{{action('OfertaController@destroy',$oferta->id)}}" method="POST">

                                                            {{ csrf_field() }}
                                                            {{--{{ method_field('DELETE') }}--}}

                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


</div>
@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabOferta').DataTable( {
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