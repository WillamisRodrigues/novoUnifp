@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Contratos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
            <li><a href="{!! route('contratos.show', [$curso->id]) !!}">Contratos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
    <div class="clearfix"></div>
    <a class="btn btn-success" style="margin-left: 1rem" href="addContrato/{!!$curso->id!!}"><i
            class="fa fa-plus"></i> Adicionar</a>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="table-responsive">
                        <table class="table datatable-list" id="contratos-table">
                            <thead>
                                <tr>
                                    <th>Nome do Contrato</th>
                                    <th>Curso</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contratos as $contrato)
                                <tr>
                                    <td>{!! $contrato->NomeContrato !!}</td>
                                    <td>{!! $curso->nomeCurso !!}</td>

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
                                            confirm('Tem certeza que deseja deletar o contrato selecionado?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
