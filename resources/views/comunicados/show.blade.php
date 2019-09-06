@extends('layouts.app')

@section('title', 'Comunicados - Detalhes')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Comunicados</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('alunos.index') !!}">Alunos</a></li>
            <li class="active">Comunicados</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
@foreach ($alunos as $aluno)
<a class="btn btn-success" style="margin-left: 1rem" href="addComunidado/{!! $aluno->id !!}"><i class="fa fa-plus"></i>
    Adicionar</a>
@endforeach
<div class="content">
    <div class="container" style="height: 100px">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-graduation-cap"></i> Informações do aluno</div>
                <div class="panel-body row">
                    @foreach ($alunos as $aluno)
                    <p class="col-md-6 col-sm-12"><strong>Matrícula</strong>: {!! str_pad($aluno->id, 8, '0',
                        STR_PAD_LEFT) !!}</p>
                    <p class="col-md-6 col-sm-12"><strong>Nome</strong>: {!! $aluno->Nome !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                <div class="table-responsive">
                    <table class="table" id="comunicados-table" style="width: 60%; margin: 0 auto;">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Comunicado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comunicados as $comunicados)
                            <tr>
                                <td>
                                    {!! str_pad($comunicados->idAluno, 8, '0', STR_PAD_LEFT) !!}</td>
                                <td>{!! $comunicados->Comunicado !!}</td>
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
