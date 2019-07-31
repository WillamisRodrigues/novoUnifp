<div class="container formulario-padrao" style="width: 80%">

    <!-- Campo Prioridade  -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="font-weight: bold"> Prioridade<span style="color: red">*</span></p>
        </td>
        <p class="col-sm-12 col-md-9 row">
            <label class="col-xs-6 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Baixa', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="background-color: green"> Baixa </span>
            </label>
            <label class="col-xs-6 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Média', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="background-color: orange"> Média
                </span> </label>
            <label class="col-xs-6 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Alta', ['class' => 'form-control'])
                !!} <span class="input-radio-prioridade" style="background-color: red"> Alta </span> </label>
        </p>
    </div>

    <!-- Campo Data  -->
    <div class="row">
        <p class="col-md-3 col-sm-12" style="margin: 10px 0px">{!! Form::label('Data', 'Data') !!}<span
                style="color: red">*</span>:</p>
        <div class="input-group date col-md-9 col-sm-12" style="width: 40%; margin: 10px 15px">
            {!! Form::date('Data', null, ['class' => 'form-control ','id'=>'datepicker'])!!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
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

    <!-- Campo Hora  -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Hora', 'Horario') !!}<span
                style="color: red">*</span>:</p>
        <div class="input-group col-md-9 col-sm-12" style="width: 40%; margin: 10px 15px">
            {!! Form::text('Hora', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>


    <!-- Campo Assunto  -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Assunto', 'Assunto') !!}<span
                style="color: red">*</span>:</p>
        <div class="col-sm-12 col-md-9 campo-texto-agenda" style="padding: 0;width: 40%; ">{!! Form::text('Assunto',
            null, ['class' => 'form-control
            mobile-input-largura',
            'style' => 'width:100%']) !!}</div>
    </div>


    <!-- Campo Tarefa  -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Tarefa', 'Tarefa') !!}<span
                style="color: red">*</span>:</p>
        <div class="col-sm-12 col-md-9 campo-texto-agenda" style="padding: 0;width: 40%; ">{!! Form::textarea('Tarefa',
            null, ['class' => 'form-control
            mobile-input-largura',
            'style' => 'width:
            100%', 'height: 10rem']) !!}</div>
    </div>

    <!-- Campo Resolvido  -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Resolvido', 'Resolvido') !!}<span style="color: red">*</span>:
        </p>
        <p class="col-sm-12 col-md-9 row">
            <label class="col-xs-12 col-sm-6 col-md-4" style="padding-right: 2rem">{!!
                Form::radio('Resolvido', 'Nao', ['class' => 'form-control']) !!} Não </label>
            <label class="col-xs-12 col-sm-6 col-md-6" style="padding-right: 2rem">{!!
                Form::radio('Resolvido', 'Aguardo outros', ['class' => 'form-control']) !!} Aguardando outros
            </label>
            <label class="col-xs-12 col-sm-6 col-md-4">{!! Form::radio('Resolvido', 'Sim', ['class' =>
                'form-control']) !!} Sim </label>
            <label class="col-xs-12 col-sm-6 col-md-6" style="padding-right: 2rem">{!!
                Form::radio('Resolvido', 'Aguardo finanças', ['class' => 'form-control']) !!} Aguardando finanças
            </label>
        </p>

    </div>

    <!-- Campo Submit  -->
    <div class="row">
        <p class="col-sm-12 col-md-3"></p>
        <div class="col-sm-12 col-md-9" style="padding: 0">
            <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
                Salvar Compromisso</button>
            <a href="{!! route('agendas.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </div>
    </div>
</div>
