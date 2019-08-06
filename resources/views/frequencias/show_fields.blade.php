@foreach ($frequencias as $frequencia)

<div class="container formulario-padrao">
    <!-- Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('idAluno', 'Aluno:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $frequencia->idAluno !!}</p>
    </div>

    <!-- Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('idTurma', 'Turma:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $frequencia->idTurma !!}</p>
    </div>

    <!-- Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('idAula', 'Aula:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $frequencia->idAula !!}</p>
    </div>

    <!-- Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Frequencia', 'Frequência:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $frequencia->Frequencia !!}</p>
    </div>
</div>
@endforeach
