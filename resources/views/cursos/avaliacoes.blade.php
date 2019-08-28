@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Avaliações</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('cursos.index') !!}">Cursos</a></li>
            <li class="active">Avaliações</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success" style="margin-left: 1rem" href="addProva/1"><i class="fa fa-plus"></i>
    Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list" id="cursos-table">
                    <thead>
                        <tr>
                            <th>Nome do Curso</th>
                            <th>Avaliação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $curso->nomeCurso }}</td>
                            <td>
                                <a href="../storage/{{$curso->caminhoProva}}" target="_blank">
                                    {{ $curso->nomeProva }}</td>
                                </a>
                            <td>
                                <div class='btn-group'>
                                    <a href="#" class='btn btn-default btn-sm'><i
                                            class="glyphicon glyphicon-zoom-in"></i></a>
                                    <a href="deletar/{{ $curso->id }}" class="btn btn-danger btn-sm"
                                        onclick="confirm('Tem certeza que deseja deletar o curso selecionado?')"><i
                                            class="
                                        glyphicon glyphicon-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
