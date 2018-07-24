@extends('layouts.app')

@section('htmlheader_title')
    Relatorios
@endsection

@section('menu_titulo')
    Relatorios
@endsection

@section('cardTitle')
    Relatorios
@endsection

@section('cardContent')
    Relatorios

@endsection

@section('cardButton')


@endsection

@section('content')

                        <form class="form-horizontal" action="{{action('RelatorioController@index')}}" method="post">
                            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <fieldset>
                                <legend>Selecione uma opção: </legend>

                                <div class="form-group">
                                    <label for="idTipo" class="control-label" >Opção</label>
                                    <div class="col-md-11">
                                        <select class="form-control " name="relatorio" id="relatorio">
                                            <option value="ProdutoInteresse">Produtos com Interesse</option>
                                            <option value="ProdutoAcesso">Produtos com mais acessos</option>
                                            <option value="ProdutoAlerta">Produtos com Alertas</option>



                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDtInicial" >Data Inicial</label>
                                    <div class="col-sm-11">
                                        <input type="date" class="form-control input-lg" id="dataInicial" name="dataInicial"
                                               value="{{old('dataInicial')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDtFinal" >Data Final</label>
                                    <div class="col-sm-11">
                                        <input type="date" class="form-control input-lg" id="dataFinal" name="dataFinal"
                                               value="{{old('dataFinal')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="idTipo" class="control-label col-sm-1">Mês</label>
                                    <div class="col-md-11">
                                        <select class="form-control" name="mes" id="mes">
                                            <option value="1">Janeiro</option>
                                            <option value="2">Fevereiro</option>
                                            <option value="3">Março</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Maio</option>
                                            <option value="6">Junho</option>
                                            <option value="7">Julho</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setembro</option>
                                            <option value="10">Outubro</option>
                                            <option value="11">Novembro</option>
                                            <option value="12">Dezembro</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right btn-lg">Gerar Relatório</button>
                                {{--<a href="{{route('funcionario.index')}}" class="btn btn-small btn-primary pull-left btn-lg" style="float: right">--}}
                                {{--Voltar--}}
                                {{--</a>--}}
                            </div>

                        </form>


@endsection
@section('scriptlocal')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#dataInicial').attr('disabled', 'disabled');
            $('#dataFinal').attr('disabled', 'disabled');
            $('#mes').attr('disabled', 'disabled');
            $('select[name="relatorio"]').change(function() {
                var str = $(this).find('option:selected').attr("value");
                if (str.localeCompare("ProdutoInteresse")===0){
                    $('#dataInicial').attr('disabled', 'disabled');
                    $('#dataFinal').attr('disabled', 'disabled');
                    $('#mes').attr('disabled', 'disabled');
                }
                if (str.localeCompare("ProdutoAcesso")===0){
                    $('#dataInicial').attr('disabled', 'disabled');
                    $('#dataFinal').attr('disabled', 'disabled');
                    $('#mes').attr('disabled', 'disabled');
                }
                if (str.localeCompare("QtdAcessoProduto")===0){
                    $('#dataInicial').attr('disabled', 'disabled');
                    $('#dataFinal').attr('disabled', 'disabled');
                    $('#mes').attr('disabled', 'disabled');
                }
                if (str.localeCompare("QtdAcessoPeriodo")===0){
                    $('#dataInicial').removeAttr('disabled');
                    $('#dataFinal').removeAttr('disabled');
                    $('#mes').attr('disabled', 'disabled');
                }


            });
        });
    </script>
@endsection