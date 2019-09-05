@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Relatório Geral de Alunos</h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    <div class="container" style="width: 80%; margin: 1rem auto;">
        {!! Form::open() !!}
        <div class="row">
            {!! Form::label('Nome', 'Aluno', ['class' => 'col-sm-1']) !!}
            {!! Form::text('Aluno', null, ['class' => 'col-sm-2']) !!}
        </div>
        <div class="row">
            {!! Form::label('Sexo', 'Sexo', ['class' => 'col-sm-1']) !!}
            <input type="radio" name="Sexo" id="Masculino" value="Masculino">
            <label style="font-weight: 100" for="Masculino">Masc</label>
            <input type="radio" name="Sexo" id="Feminino" value="Feminino" style="margin-left:1rem">
            <label style="font-weight: 100" for="Feminino">Fem</label>
        </div>
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
            {!! Form::label('Pagamentos', 'Pagamentos',['class' => 'col-sm-1']) !!}
            <input type="radio" name="Pagamentos" id="Atrasado" value="Atrasado">
            <label class="bg-vermelho-redondo" style="padding: 2px 8px" for="Atrasado">Atrasado</label>
            <input type="radio" name="Pagamentos" id="Em dia" value="Em dia" style="margin-left: 1rem">
            <label class="bg-azul-redondo" style="padding: 2px 8px" for="Em dia">Em dia</label>
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
                            <th class="text-center">Sexo</th>
                            <th>Idade</th>
                            <th>Status do Aluno</th>
                            <th>Curso</th>
                            <th>Turma</th>
                            <th>Período</th>
                            {{-- <th>Horário</th> --}}
                            <th>Frequência %</th>
                            <th>Nota Média</th>
                            <th>Pagamentos</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>00000000</td>
                            <td>nome do aluno</td>
                            <td>Masculino</td>
                            <td>10 anos</td>
                            <td>Estudando</td>
                            <td>Design Standard</td>
                            <td>Turma 01</td>
                            <td>Manhã</td>
                            <td>16:00 às 18:00 hrs</td>
                            <td>100%</td>
                            <td>10,0</td>
                            <td>
                                <p class="bg-vermelho-redondo">Atrasado</p>
                            </td>
                        </tr> --}}
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
                            <td class="text-center">
                                @php
                                    foreach ($alunoGeral as $alunoG) {
                                        if($aluno->Matricula == $alunoG->id){
                                            if($alunoG->Sexo == 'Masculino'){
                                                echo "M";
                                            } else {
                                                echo "F";
                                            }
                                        }
                                    }
                                @endphp

                            </td>
                            <td>
                                @php
                                    foreach ($alunoGeral as $alunoG) {
                                        if($aluno->Matricula == $alunoG->id){
                                            // echo str_pad($alunoG->id, 8, '0', STR_PAD_LEFT);
                                            // echo date('Y', strtotime($alunoG->NascimentoAluno))-date('Y', strtotime($hoje))." anos";
                                            echo date('Y', strtotime($alunoG->NascimentoAluno));
                                        }
                                    }
                                @endphp
                                 {{-- {!! date('Y', strtotime($aluno->NascimentoAluno))-date('Y', strtotime($hoje)); !!} --}}
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
                            {{-- <td>
                                <p class="bg-vermelho-redondo">Atrasado</p>
                            </td> --}}
                            <td> </td>
                            <td> </td>
                            <td>
                                {!! $aluno->Vencimento !!}
                            </td>
                            {{-- <td>
                                <p class="bg-vermelho-redondo">Vencido</p>
                            </td> --}}
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
