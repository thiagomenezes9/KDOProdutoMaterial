@extends('layouts.app')

@section('htmlheader_title')
    Marcca
@endsection

@section('menu_titulo')
    Marca
@endsection

@section('cardTitle')
    Marcas
@endsection

@section('cardContent')
    Listagem das Marcas
@endsection

@section('cardButton')

    <div align="right" ><a href="{{route('marcas.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round"><strong>+</strong></a></div>

@endsection

@section('content')
    <table class="table table-striped table-no-bordered table-hover" id="tabMarcas">
        <thead>
        <tr>
            <th><strong>Descrição</strong></th>
            <th class="disabled-sorting text-right"><strong>Ações</strong></th>
        </tr>
        </thead>


        <tbody>
        @foreach($marcas as $m)
            <tr>
                <td align="left">{{ $m->descricao }}</td>
                <td class="td-actions text-right">
                    <a  href="{{route('marcas.show',$m->id)}}" >
                        <i class="material-icons">search</i>

                    </a>

                    <a   href="{{route('marcas.edit',$m->id)}}" >
                        <i class="material-icons">edit</i>

                    </a>

                    <a  data-toggle="modal" href="#myModal{{ $m->id }}" >
                        <i class="material-icons">close</i>

                    </a>

                    <div class="modal fade modal-danger" id="myModal{{ $m->id }}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Excluir</h4>
                                </div>

                                <div class="modal-body text-center">
                                    <p>Realmente Deseja excluir {{$m->descricao}} ??</p>
                                </div>

                                <div class="modal-footer">

                                    <form id="formDelete{{ $m->id }}"
                                          action="{{action('MarcaController@destroy',$m->id)}}" method="POST">

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

    @endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabMarcas').DataTable( {
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