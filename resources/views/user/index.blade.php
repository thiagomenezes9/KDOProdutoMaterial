@extends('layouts.app')

@section('htmlheader_title')
Usuários
@endsection

@section('menu_titulo')
Usuários
@endsection

@section('cardTitle')
Usuários
@endsection

@section('cardContent')
Listagem dos Usuários

@endsection

@section('cardButton')


@endsection

@section('content')




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


                        <table class="table table-hover" id="tabCoordenacoes">
                            <thead>
                            <tr>
                                <th ><strong>Nome</strong></th>
                                <th ><strong>Ativo</strong></th>
                                <th  class="disabled-sorting text-right"><strong>Ações</strong></th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($usuarios as $u)
                                <tr align="center">
                                    <td align="left">{{ $u->name }}</td>
                                    <td align="left">{{$u->ativo ? 'Sim' : 'Não'}}</td>
                                    <td class="td-actions text-right">
                                        <a  href="{{route('usuarios.show',$u->id)}}" >
                                            <i class="material-icons">search</i>

                                        </a>

                                        <a  href="{{route('usuarios.edit',$u->id)}}" >
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
            $('#tabCoordenacoes').DataTable( {
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