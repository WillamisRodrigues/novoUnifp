@extends('layouts.app')

@section('title', 'Alunos Atrasados')

@section('content')
<section class="content-header">
    <h1 class="">Relatório de Alunos Atrasados</h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    <div class="container" style="width: 80%; margin: 1rem auto;">
        {!! Form::open(['url' => 'filtroAlunosAtrasados']) !!}
        <div class="row">
            {!! Form::label('Status', 'Status', ['class' => 'col-sm-1']) !!}
            <input type="radio" name="Status" id="Estudando" value="Estudando">
            <label style="font-weight: 100" for="Estudando">Estudando</label>
            <input type="radio" name="Status" id="Trancado" value="Trancado" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Trancado">Trancado</label>
            <input type="radio" name="Status" id="Desistente" value="Desistente" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Desistente">Desistente</label>
            <input type="radio" name="Status" id="Concluido" value="Concluido" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Concluido">Concluído</label>
            <input type="radio" name="Status" id="Abandono" value="Abandono" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Abandono">Abandono</label>
        </div>
        <div class="row">
            {!! Form::label('Periodo', 'Período', ['class' => 'col-sm-1']) !!}
            <input type="radio" name="Periodo" id="Manha" value="Manha">
            <label style="font-weight: 100" for="Manha">Manhã</label>
            <input type="radio" name="Periodo" id="Tarde" value="Tarde" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Tarde">Tarde</label>
            <input type="radio" name="Periodo" id="Noite" value="Noite" style="margin-left: 1rem">
            <label style="font-weight: 100" for="Noite">Noite</label>
        </div>
        <div class="row">
            {!! Form::label('Vencimento', 'Vencimento', ['class' => 'col-sm-1']) !!}
            Entre:

            <input type="date" name="VencimentoInicial" id="VencimentoInicial">
            e

            <input type="date" name="VencimentoFinal" id="VencimentoFinal">
        </div>
        <div style="margin-top: 1rem">
            <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i> Filtrar</button>
            <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Exportar</button>
        </div>
        {!! Form::close() !!}
    </div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list" id="alunos-table">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Aluno</th>
                            <th>Status do Aluno</th>
                            <th>Curso</th>
                            <th>Turma</th>
                            <th>Período</th>
                            <th>Pagamento</th>
                            <th>Parcela</th>
                            <th>Referente</th>
                            <th>Vencimento</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alunos as $aluno)
                        <tr>
                            <td>
                                @php
                                    foreach ($alunoGeral as $alunoG) {
                                        if($aluno->Matricula == $alunoG->id){
                                            echo str_pad($alunoG->id, 8, '0', STR_PAD_LEFT);
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    foreach ($alunoGeral as $alunoG) {
                                        if($aluno->Matricula == $alunoG->id){
                                            echo $alunoG->Nome;
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    foreach ($alunoGeral as $alunoG) {
                                        if($aluno->Matricula == $alunoG->id){
                                            echo $alunoG->Status;
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach ($alunoGeral as $alunoG) {
                                    foreach ($cursos as $curso) {
                                        if($curso->id == $alunoG->idCurso && $aluno->Matricula == $alunoG->id){
                                            echo $curso->nomeCurso;
                                        }
                                    }
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach ($alunoGeral as $alunoG) {
                                    foreach ($turmas as $turma) {
                                        if($turma->id == $alunoG->idTurma && $aluno->Matricula == $alunoG->id){
                                            echo $turma->NomeTurma;
                                        }
                                    }
                                }
                                @endphp
                            </td>
                            <td>
                                @php
                                foreach ($alunoGeral as $alunoG) {
                                    foreach ($turmas as $turma) {
                                        if($turma->id == $alunoG->idTurma && $aluno->Matricula == $alunoG->id){
                                            echo $turma->Periodo;
                                        }
                                    }
                                }
                                @endphp
                            </td>
                            <td>
                                <p class="bg-vermelho-redondo">Atrasado</p>
                            </td>
                            <td>{!! $aluno->Parcela !!}</td>
                            <td>{!! $aluno->Referencia !!}</td>
                            <td>
                                {{-- {!! $aluno->Vencimento !!} --}}
                                {!! date('d/m/Y', strtotime($aluno->Vencimento)); !!}

                            </td>
                            <td>
                                <p class="bg-vermelho-redondo">Vencido</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
