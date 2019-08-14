@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Contratos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
            {{-- falta a rota --}}
            <li><a href="{!! route('cursos.index') !!}">Contratos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
    <div class="clearfix"></div>
    <a class="btn btn-success" style="margin-left: 1rem" href="{!! route('contratos.create') !!}"><i
            class="fa fa-plus"></i> Adicionar</a>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    {{-- @include('contratos.show_fields') --}}
                    <div class="table-responsive">
                        <table class="table" id="contratos-table">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Curso ID</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($contratos as $contrato)
                                <tr>
                                    <td>{!! $contrato->idCurso !!}</td>
                                    <td>{!! $contrato->Contrato1 !!}</td>
                                    <td>{!! $contrato->Assinatura1 !!}</td>
                                    <td>{!! $contrato->Valores1 !!}</td>
                                    <td>{!! $contrato->Matricula1 !!}</td>
                                    <td>{!! $contrato->Contrato2 !!}</td>
                                    <td>{!! $contrato->Assinatura2 !!}</td>
                                    <td>{!! $contrato->Valores2 !!}</td>
                                    <td>{!! $contrato->Matricula2 !!}</td>
                                    <td>{!! $contrato->Prestadora !!}</td>
                                    <td>{!! $contrato->MultaContrato !!}</td>
                                    <td>{!! $contrato->MoraContrato !!}</td>
                                    <td>{!! $contrato->Multa !!}</td>
                                    <td>{!! $contrato->Mora !!}</td>
                                    <td>
                                        {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' =>
                                        'delete']) !!}
                                        <div class='btn-group'>
                                            <a href="{!! route('contratos.show', [$contrato->id]) !!}"
                                                class='btn btn-default btn-xs'><i
                                                    class="glyphicon glyphicon-eye-open"></i></a>
                                            <a href="{!! route('contratos.edit', [$contrato->id]) !!}"
                                                class='btn btn-default btn-xs'><i
                                                    class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' =>
                                            'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return
                                            confirm('Are
                                            you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach --}}
                                <tr>
                                    <td>nome do contrato com descrição</td>
                                    <td>id do curso (pegar id e selecionar por nome</td>
                                    <td>botoes de deletar e editar</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <a href="{!! route('contratos.index') !!}" class="btn btn-default">Back</a> --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
