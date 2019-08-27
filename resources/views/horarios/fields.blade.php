<div class="container formulario-padrao">
    <!-- Horario Field -->
    {{-- <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('HorarioInicio', 'Hora de início:') !!}<span style="color: red">*</span></p>
        <p class="col-xs-12 col-sm-6">{!! Form::text('HorarioInicio', null, ['class' => 'form-control']) !!}</p>
    </div>

    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('HorarioTermina', 'Hora de término:') !!}<span style="color: red">*</span></p>
        <p class="col-xs-12 col-sm-6">{!! Form::text('HorarioTermina', null, ['class' => 'form-control']) !!}</p>
    </div> --}}

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

    <!-- Campo Hora  -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('HorarioInicio', 'Horário de início:') !!}<span
                style="color: red">*</span>:</p>
        <div class="input-group col-md-9 col-sm-12" style="width: 40%; margin: 10px 15px">
            {!! Form::text('HorarioInicio', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('HorarioTermina', 'Horário de término:') !!}<span
                style="color: red">*</span>:</p>
        <div class="input-group col-md-9 col-sm-12" style="width: 40%; margin: 10px 15px">
            {!! Form::text('HorarioTermina', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Horário</button>
            <a href="{!! route('horarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
