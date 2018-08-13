@extends('layouts.app')

@section('htmlheader_title')
    Campanhas
@endsection

@section('menu_titulo')
    Campanhas
@endsection

@section('cardTitle')
    Campanhas
@endsection

@section('cardContent')
    Campanhas

@endsection

@section('cardButton')


@endsection

@section('content')

                        <form class="form-horizontal" action="{{action('CampanhaController@index')}}" method="post">
                            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <fieldset>
                                <legend>Selecione uma opção: </legend>

                                <div class="form-group">
                                    <label for="idTipo" class="control-label" >Opção</label>
                                    <div class="col-md-11">
                                        <select class="form-control " name="campanha" id="campanha">
                                            <option value="ProdutoInteresse">Enviar email para usuarios</option>
                                            <option value="ProdutoAcesso">Enviar oferta para usuarios</option>
                                            <option value="ProdutoAlerta"></option>



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

@endsection