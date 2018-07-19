@extends('layouts.app')

@section('htmlheader_title')
Estabelecimentos
@endsection

@section('menu_titulo')
Estabelecimentos
@endsection

@section('cardTitle')
Estabelecimentos
@endsection

@section('cardContent')
Listagem dos Estabelecimentos

@endsection

@section('cardButton')


    <div align="right" >
        <a href="{{route('estabelecimentos.create')}}" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons">add</i>
        </a>
    </div>

@endsection

@section('content')


                        <table class="table table-hover" id="tabEstabelecimentos">
                            <thead>
                            <tr>
                                <th><strong>Descrição</strong></th>
                                <th class="disabled-sorting text-right"><strong>Ações</strong></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($supermercados as $supermercado)
                                <tr align="center">
                                    <td align="left">{{ $supermercado->nome }}</td>
                                    <td class="td-actions text-right">
                                        <a  href="{{route('estabelecimentos.show',$supermercado->id)}}" >
                                            <i class="material-icons">search</i>
                                        </a>

                                        <a  href="{{route('estabelecimentos.edit',$supermercado->id)}}" >
                                            <i class="material-icons">edit</i>
                                        </a>



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



@endsection

@section('scriptlocal')


    <script type="text/javascript">
        $(document).ready(function () {
            $('#tabEstabelecimentos').DataTable( {
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