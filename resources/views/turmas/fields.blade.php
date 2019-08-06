<div class="container formulario-padrao">
    <!-- Curso Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Curso', 'Curso:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6 select-padrao">
            {{-- {!! Form::text('Curso', null, ['class' => 'form-control']) !!}
            cursos --}}
            <select name="Curso" id="Curso" style="width: 50%">
                @foreach($cursos as $curso )
                <option value="{{ $curso->nomeCurso }}">{{ $curso->nomeCurso }}</option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Nometurma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('NomeTurma', 'Nome da Turma:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::text('NomeTurma', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Diasdasemana Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DiasDaSemana', 'Dias da Semana:') !!}<span
                style="color: red">*</span></p>
        {{-- <div class="col-sm-12 col-md-6">
            {!! Form::date('DiasDaSemana', null, ['class' =>
            'form-control','id'=>'DiasDaSemana']) !!}
        </div> --}}
        <div class="input-group col-md-6 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::date('DiasDaSemana', null, ['class' => 'form-control','id'=>'DiasDaSemana']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Periodo Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Periodo', 'Período:') !!}<span style="color: red">*</span></p>
        <div class="col-sm-12 col-md-6">
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
        <div class="input-group col-md-6 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::text('Horario', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <!-- Datainicio Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataInicio', 'Data de Início:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-6 col-sm-12 col-xs-12"
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
        <div class="input-group col-md-6 col-sm-12 col-xs-12"
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
        <div class="input-group col-md-6 col-sm-12 col-xs-12"
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
        <p class="col-sm-12 col-md-6">{!! Form::text('Professor', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Vagas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Vagas', 'Vagas:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('Vagas', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Cronograma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Cronograma', 'Cronograma:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-6">{!! Form::text('Cronograma', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Status Field -->
    <input type="hidden" name="Status" id="Status" value="Ativa">

    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('turmas.index') !!}" class="btn btn-default">Cancel</a> --}}
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
