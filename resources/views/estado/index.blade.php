@extends('layouts.app')

@section('htmlheader_title')
    Estados
@endsection

@section('menu_titulo')
    Estados
@endsection

@section('cardTitle')
    Estados
@endsection

@section('cardContent')
    Listagem dos Estados

@endsection

@section('cardButton')

    <div align="right" >
        <a href="{{route('estados.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">add</i>
        </a>
    </div>

@endsection

@section('content')


                        <table class="table table-hover" id="tabEstados">
                            <thead>
                            <tr>
                                <th ><strong>Nome</strong></th>
                                <th ><strong>Pais</strong></th>
                                <th class="disabled-sorting text-right"><strong>Ações</strong></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($estados as $e)
                                <tr align="center">
                                    <td align="left">{{ $e->nome }}</td>
                                    <td align="left">{{$e->pais->nome}}</td>
                                    <td class="td-actions text-right">
                                        <a  href="{{route('estados.show',$e->id)}}" >
                                            <i class="material-icons">search</i>

                                        </a>

                                        <a  href="{{route('estados.edit',$e->id)}}" >
                                            <i class="material-icons">edit</i>

                                        </a>

                                        <a  data-toggle="modal" href="#myModal{{ $e->id }}" >
                                            <i class="material-icons">close</i>

                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $e->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$e->nome}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $e->id }}"
                                                              action="{{action('EstadoController@destroy',$e->id)}}" method="POST">

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
            $('#tabEstados').DataTable( {
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