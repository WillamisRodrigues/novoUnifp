@extends('layouts.app')

@section('title', 'Relatório Geral de Alunos')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Relatório Geral de Alunos</h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    <div class="container" style="width: 80%; margin: 1rem auto;">
        {!! Form::open(['route' => 'filtroGeralAlunos']) !!}
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
                            <th>Nascimento</th>
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
                        @foreach ($alunoGeral as $aluno)
                        <tr>
                            <td>{!! $aluno->id !!}</td>
                            <td>{!! $aluno->Nome !!}</td>
                            <td>{!! $aluno->Sexo !!}</td>
                            <td>
                                {{-- {!! $aluno->NascimentoAluno !!} --}}
                                {!! date('d/m/Y', strtotime($aluno->NascimentoAluno)); !!}
                            </td>
                            <td>{!! $aluno->Status !!}</td>
                            <td>
                                @foreach ($cursos as $curso)
                                    @if ($aluno->idCurso == $curso->id)
                                        {!! $curso->nomeCurso !!}
                                    @endif
                                @endforeach
                                {{-- {!! $aluno->idCurso !!} --}}
                            </td>
                            <td>
                                @foreach ($turmas as $turma)
                                    @if ($aluno->idTurma == $turma->id)
                                        {!! $turma->NomeTurma !!}
                                    @endif
                                @endforeach
                                {{-- {!! $aluno->idTurma !!} --}}
                            </td>
                            <td>
                                @foreach ($turmas as $turma)
                                    @if ($aluno->idTurma == $turma->id)
                                        {!! $turma->Periodo !!}
                                    @endif
                                @endforeach
                                {{-- {!! '$aluno->Periodo' !!} --}}
                            </td>
                            <td>{!! '$aluno->Frequencia' !!}</td>
                            <td>{!! '$aluno->Media' !!}</td>
                            <td>
                                @php
                                    // $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
                                    // foreach ($pagamentos as $pagamento) {
                                    //     if($pagamento->Matricula == $aluno->id){
                                    //         if($pagamento->DataPgto){
                                    //             $resultado = "<label class='bg-azul-redondo' style='padding: 2px 8px' for='Em dia'>Em dia</label>";
                                    //         } else {
                                    //             $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
                                    //         }
                                    //     }
                                    // }
                                    // echo $resultado;
                                    $resultado = App\Http\Controllers\RelatoriosController::pagamentos($aluno->id);
                                    echo $resultado;
                                @endphp
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
