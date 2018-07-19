@extends('layouts.app')

@section('htmlheader_title')
    Preços
@endsection

@section('menu_titulo')
    Preços
@endsection

@section('cardTitle')
    Preços
@endsection

@section('cardContent')
    Listagem dos Preços

@endsection

@section('cardButton')



    <div align="right">
        <a href="{{route('precos.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">add</i>
        </a>
    </div>

@endsection

@section('content')

    <div class="table-responsive">


        <table class="table table-hover" id="tabPreco">
            <thead>
            <tr>
                <th><strong>Descrição</strong></th>
                <th><strong>Marca</strong></th>
                <th><strong>Estabelecimento</strong></th>
                <th><strong>Valor</strong></th>
                <th class="disabled-sorting text-right"><strong>Ações</strong></th>
            </tr>
            </thead>


            <tbody>
            @foreach($precos as $preco)
                <tr align="center">
                    <td align="left">{{ $preco->produto->descricao }}</td>
                    <td align="left">{{ $preco->produto->marca->descricao }}</td>
                    <td align="left">{{ $preco->supermercado->nome }}</td>
                    <td align="left">{{ $preco->valor }}</td>
                    <td class="td-actions text-right">


                        <a href="{{route('precos.edit',$preco->id)}}">
                            <i class="material-icons">edit</i>

                        </a>

                        <a data-toggle="modal" href="#myModal{{ $preco->id }}">
                            <i class="material-icons">close</i>

                        </a>

                        <div class="modal fade modal-danger" id="myModal{{ $preco->id }}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Excluir</h4>
                                    </div>

                                    <div class="modal-body text-center">
                                        <p>Realmente Deseja excluir {{$preco->produto->descricao}} ??</p>
                                    </div>

                                    <div class="modal-footer">

                                        <form id="formDelete{{ $preco->id }}"
                                              action="{{action('PrecoController@destroy',$preco->id)}}" method="POST">

                                            {{ csrf_field() }}
                                            {{--{{ method_field('DELETE') }}--}}

                                            <input type="hidden" name="_method" value="DELETE">

                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                Cancelar
                                            </button>


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

        {{--<div class="text-center">
            {!! $marcas->links() !!}
        </div>--}}


    </div>



@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabPreco').DataTable({
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