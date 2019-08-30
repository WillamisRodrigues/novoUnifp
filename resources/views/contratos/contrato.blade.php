@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Contratos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
            {{-- falta a rota --}}
            <li><a href="{!! route('contratos.show', [$contrato->idCurso]) !!}">Contratos</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="formulario-padrao container">

                <div class="row">
                    <div class="col-sm-4">
                        <p>Contrato: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->NomeContrato }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Valor da Matrícula: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->Matricula }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Multa do Contrato: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->MultaContrato }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Mora do Contrato: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->MoraContrato }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Multa: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->Multa }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Mora: </p>
                    </div>
                    <div class="col sm-7">
                        <p>{{ $contrato->Mora }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <p>Termos do Contrato: </p>
                    </div>
                    <div class="col sm-7">
                        {{-- {{ $contrato->Contrato }} --}}
                        @php
                            echo "$contrato->Contrato"
                        @endphp
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 1rem">
            <div class="col-xs-4 col-sm-4"></div>
            <a href="{!! route('contratos.show', [$contrato->idCurso]) !!}" class="btn btn-default">Voltar</a>
        </div>
    </div>
</div>
@endsection
