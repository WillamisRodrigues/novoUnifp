@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Comunicados</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('alunos.index') !!}">Comunicados</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
@foreach ($alunos as $aluno)
<a class="btn btn-success" style="margin-left: 1rem" href="{!! route('comunicados.create', $aluno->id) !!}"><i
        class="fa fa-plus"></i> Adicionar</a>
@endforeach
<div class="content">
    <div class="container" style="height: 100px">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-graduation-cap"></i> Informações do aluno</div>
                <div class="panel-body row">
                    @foreach ($alunos as $aluno)
                    <p class="col-md-6 col-sm-12"><strong>Matrícula</strong>: {!! $aluno->id !!}</p>
                    <p class="col-md-6 col-sm-12"><strong>Nome</strong>: {!! $aluno->Nome !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                {{-- @include('comunicados.show_fields') --}}
                <div class="table-responsive">
                    <table class="table" id="comunicados-table">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Comunicado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <td></td>
                        <td>Não há comunicados a serem exibidos</td>
                        <td></td>
                        <tbody>
                            @foreach($comunicados as $comunicados)
                            <tr>
                                <td>{!! $comunicados->idAluno !!}</td>
                                <td>{!! $comunicados->Comunicado !!}</td>
                                <td>
                                    {!! Form::open(['route' => ['comunicados.destroy', $comunicados->id], 'method'
                                    =>
                                    'delete']) !!}
                                    <div class='btn-group'>
                                        <a href="{!! route('comunicados.show', [$comunicados->id]) !!}"
                                            class='btn btn-default btn-xs'><i
                                                class="glyphicon glyphicon-eye-open"></i></a>
                                        <a href="{!! route('comunicados.edit', [$comunicados->id]) !!}"
                                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' =>
                                        'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return
                                        confirm('Are
                                        you sure?')"]) !!}
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{!! route('alunos.index') !!}" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
