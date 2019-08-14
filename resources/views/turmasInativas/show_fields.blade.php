<div class="container formulario-padrao">
    <!-- Curso Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Curso', 'Curso:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Curso !!}</p>
    </div>

    <!-- Nometurma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('NomeTurma', 'Nome da Turma:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->NomeTurma !!}</p>
    </div>

    <!-- Diasdasemana Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DiasDaSemana', 'Dias da Semana:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->DiasDaSemana !!}</p>
    </div>

    <!-- Periodo Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Periodo', 'Período:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Periodo !!}</p>
    </div>

    <!-- Horario Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Horario', 'Horário:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Horario !!}</p>
    </div>

    <!-- Datainicio Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DataInicio', 'Data de Início:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->DataInicio !!}</p>
    </div>

    <!-- Datatermino Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DataTermino', 'Data de Término:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->DataTermino !!}</p>
    </div>

    <!-- Duracaoaulas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DuracaoAulas', 'Duração das Aulas:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->DuracaoAulas !!}</p>
    </div>

    <!-- Professor Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Professor', 'Professor:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Professor !!}</p>
    </div>

    <!-- Vagas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Vagas', 'Vagas:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Vagas !!}</p>
    </div>

    <!-- Cronograma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('Cronograma', 'Cronograma:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $turma->Cronograma !!}</p>
    </div>
</div>
