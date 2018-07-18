@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Marcas
@stop

@section('contentheader_title')

@stop

@section('contentheader_description')
    Descrição
@stop


@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Marcas</h3>

                        <div align="right"><a href="{{route('marcas.index')}}" class="btn btn-info">Voltar</a></div>
                        {{--<div align="right"><a href="{{route('pais.create')}}" class="btn btn-success">Novo</a></div>--}}
                    </div>

                    <div class="box-body">


                        <p><strong><h2>Marca : {{$marca->descricao}}</h2></strong></p><br>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection