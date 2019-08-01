<div class="container formulario-padrao">
    <!-- Nomeaula Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('NomeAula', 'Nome da Aula:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->NomeAula !!}</p>
    </div>

    <!-- Dataaula Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataAula', 'Data da Aula:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->DataAula !!}</p>
    </div>

    <!-- Datatermino Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataTermino', 'Data de Término:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->DataTermino !!}</p>
    </div>

    <!-- Diassemana Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DiasSemana', 'Dias da Semana:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->DiasSemana !!}</p>
    </div>

    <!-- Planejamento Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Planejamento', 'Planejamento:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->Planejamento !!}</p>
    </div>

    <!-- Relatorioprofessor Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('RelatorioProfessor', 'Relatório do Professor:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $aulasCronograma->RelatorioProfessor !!}</p>
    </div>

</div>
