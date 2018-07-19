@extends('layouts.app')

@section('htmlheader_title')
Sugestões
@endsection

@section('menu_titulo')
Sugestões
@endsection

@section('cardTitle')
Sugestões
@endsection

@section('cardContent')
Listagem das Sugestões

@endsection

@section('cardButton')



    <div align="right" >
        <a href="{{route('sugestao.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">add</i>
        </a>
    </div>

@endsection

@section('content')


                        <table class="table table-hover" id="tabSugestao">
                            <thead>
                            <tr>
                                <th ><strong>Descrição</strong></th>
                                <th class="disabled-sorting text-right"><strong>Ações</strong></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($sugestoes as $sugestao)
                                <tr align="center">
                                    <td align="left">{{ $sugestao->descricao }}</td>
                                    <td class="td-actions text-right">
                                        <a  href="{{route('sugestao.show',$sugestao->id)}}" >
                                            <i class="material-icons">search</i>

                                        </a>



                                        @if(Auth::user()->tipo == 'ADMIN')

                                        <a  data-toggle="modal" href="#myModal{{ $sugestao->id }}" >
                                            <i class="material-icons">close</i>

                                        </a>

                                        <div class="modal fade modal-danger" id="myModal{{ $sugestao->id }}" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Excluir</h4>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Realmente Deseja excluir {{$sugestao->descricao}} ??</p>
                                                    </div>

                                                    <div class="modal-footer">

                                                        <form id="formDelete{{ $sugestao->id }}"
                                                              action="{{action('SugestaoController@destroy',$sugestao->id)}}" method="POST">

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

                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabSugestao').DataTable( {
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