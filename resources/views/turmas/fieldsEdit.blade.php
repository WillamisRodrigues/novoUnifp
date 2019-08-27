<div class="container formulario-padrao">
    <!-- Curso Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('idCurso', 'Curso:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-8 select-padrao">
            <select name="idCurso" id="idCurso" style="width: 50%">
                @foreach($cursos as $curso )
                <option value="{{ $curso->id }}">{{ $curso->nomeCurso }}</option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Nometurma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('NomeTurma', 'Nome da Turma:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-8">{!! Form::text('NomeTurma', null, ['class' => 'form-control']) !!}</p>
    </div>

    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DiasDaSemana', 'Dias da Semana:') !!}<span
                style="color: red">*</span></p>
        <div class="col-xs-12 col-sm-9" class="display: inline-block">
            <input type="checkbox" name="DiasDaSemana[]" id="Seg" value="Seg"><label
                style="margin-right: 3px; margin-left: 2px" for="Seg"> Segunda </label>
            <input type="checkbox" name="DiasDaSemana[]" id="Ter" value="Ter"><label
                style="margin-right: 3px; margin-left: 2px" for="Ter"> Terça </label>
            <input type="checkbox" name="DiasDaSemana[]" id="Qua" value="Qua"><label
                style="margin-right: 3px; margin-left: 2px" for="Qua"> Quarta </label>
            <input type="checkbox" name="DiasDaSemana[]" id="Qui" value="Qui"><label
                style="margin-right: 3px; margin-left: 2px" for="Qui"> Quinta </label>
            <input type="checkbox" name="DiasDaSemana[]" id="Sex" value="Sex"><label
                style="margin-right: 3px; margin-left: 2px" for="Sex"> Sexta </label>
            <input type="checkbox" name="DiasDaSemana[]" id="Sab" value="Sab"><label for="Sab"> Sábado </label>
        </div>
    </div>

    <!-- Periodo Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Periodo', 'Período:') !!}<span style="color: red">*</span></p>
        <div class="col-sm-12 col-md-8">
            <label class="col-xs-12 col-sm-6 col-md-4">{!! Form::radio('Periodo', 'Manha', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Manhã </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-4">{!! Form::radio('Periodo', 'Tarde', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Tarde </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-4">{!! Form::radio('Periodo', 'Noite', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Noite </span>
            </label>
        </div>
    </div>


    <!-- Horario Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Horario', 'Horário:') !!}<span style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12 select-padrao"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            <select name="Horario" id="Horario" style="width: 100%">
                @foreach($horarios as $horario )
                <option value="{{ $horario->id }}">Das {{ $horario->HorarioInicio }} às {{ $horario->HorarioTermina }}
                </option>
                @endforeach
            </select>
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <!-- Datainicio Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataInicio', 'Data de Início:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::date('DataInicio', null, ['class' => 'form-control','id'=>'DataInicio']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Datatermino Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataTermino', 'Data de Término:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::date('DataTermino', null, ['class' => 'form-control','id'=>'DataTermino']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Duracaoaulas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DuracaoAulas', 'Duração das Aulas:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::text('DuracaoAulas', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <!-- Professor Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Professor', 'Professor:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-8 select-padrao">
            <select name="Professor" id="Professor" style="width: 50%">
                @foreach($professores as $professor )
                <option value="{{ $professor->Nome }}">{{ $professor->Nome }}</option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Vagas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Vagas', 'Vagas:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-8">{!! Form::number('Vagas', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Cronograma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Cronograma', 'Cronograma:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-8 select-padrao">
            <select name="Cronograma" id="Cronograma" style="width: 50%">
                @foreach($cronogramas as $cronograma )
                <option value="{{ $cronograma->Nome }}">{{ $cronograma->Nome }}</option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Status Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Status', 'Status:') !!}<span style="color: red">*</span></p>
        <div class="col-sm-12 col-md-8">
            <label>{!! Form::radio('Status', 'Inativa', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Inativa </span>
            </label>
            <label>{!! Form::radio('Status', 'Ativa', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Ativa </span>
            </label>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-8">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i>
                Salvar
                Turma</button>
            <a href="{!! route('turmas.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
<script>
    //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            timeFormat: 'HH:mm:ss'
        })
</script>
@endsection
