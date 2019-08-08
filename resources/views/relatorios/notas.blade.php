@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Pagamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('pagamentos.index') !!}">Pagamentos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="container" style="height: 100px">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-graduation-cap"></i> Informações do aluno</div>
                <div class="panel-body row">
                    {{-- @foreach ($alunos as $aluno) --}}
                    <p class="col-md-6 col-sm-12"><strong>Matrícula</strong>:
                        {{-- {!! $aluno->id !!} --}}
                    </p>
                    <p class="col-md-6 col-sm-12"><strong>Nome</strong>:
                        {{-- {!! $aluno->Nome !!} --}}
                    </p>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>

    <h3 class="h3">Minhas Notas</h3>
    <div class="box box-primary">
        <table class="table table-responsive">
            <thead>
                <tr style="background-color: #00a64d; color: #fff; font-weight: bold">
                    <td>Avaliação</td>
                    <td>Illustrator CC</td>
                    <td>Photoshop CC</td>
                    <td>Blocky</td>
                    <td>Scratch</td>
                    <td>Unity</td>
                    <td>Blender Modelagem</td>
                    <td>Blender Animação</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prova Teórica</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Quiz</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Trabalhos</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Média</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h3 class="h3">Trabalhos Alunos</h3>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                {{-- @foreach($alunos as $aluno) --}}
                <table class="table display datatable-list">
                    <thead>
                        <tr>
                            <th>Nº Aula</th>
                            <th>Download Atividade</th>
                            <th>Nota</th>
                            <th>Data da Realização</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($pagtos as $pagto)
                        <tr>
                            <td>-<td>
                            <td>-<td>
                            <td>-<td>
                            <td>-</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
                {{-- @endforeach --}}
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
