<table class="table tabela-agenda-adicionar">

    <!-- Campo Prioridade  -->
    <tr>
        <td></td>
        <div class="radio">
            <td style="width: 15rem"><p style="font-weight: bold"> Prioridade<span style="color: red">*</span></p></td>
            <td class="row">
                <label class="col-xs-12 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Baixa', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: green"> Baixa </span> </label>
                <label class="col-xs-12 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Média', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: orange"> Média </span> </label>
                <label class="col-xs-12 col-sm-3 col-md-2">{!! Form::radio('prioridade', 'Alta', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: red"> Alta </span> </label>
            </td>
        </div>
    </tr>

    <!-- Campo Data  -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">{!! Form::label('Data', 'Data') !!}<span style="color: red">*</span>:</td>
            <td>
                <div class="input-group date" style="width: 5rem">
                    {!! Form::date('Data', null, ['class' => 'form-control mobile-input-largura','id'=>'datepicker']) !!}
                    <div class="input-group-addon agenda-input-hora">
                        <i class="fa fa-calendar"></i>
                    </div>
                </div>
            </td>
        </div>
    </tr>

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
    <tr>
        <td></td>
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <td style="width: 15rem">
                    {!! Form::label('Hora', 'Horario') !!}<span style="color: red">*</span>:
                </td>
                <td>
                    <div class="input-group" style="width: 21.2rem">
                        {!! Form::text('Hora', null, ['class' => 'form-control timepicker  mobile-input-largura']) !!}
                        <div class="input-group-addon agenda-input-hora">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </td>
            </div>
        </div>
    </tr>

    <!-- Campo Assunto  -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Assunto', 'Assunto') !!}<span style="color: red">*</span>:
            </td>
            <td>{!! Form::text('Assunto', null, ['class' => 'form-control mobile-input-largura', 'style' => 'width: 50rem']) !!}</td>
        </div>
    </tr>

    <!-- Campo Tarefa  -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Tarefa', 'Tarefa') !!}<span style="color: red">*</span>:
            </td>
            <td>
                {!! Form::textarea('Tarefa', null, ['class' => 'form-control mobile-input-largura', 'style' => 'width: 50rem', 'height: 10rem']) !!}
            </td>
        </div>
    </tr>

    <!-- Campo Resolvido  -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Resolvido', 'Resolvido') !!}<span style="color: red">*</span>:
            </td>
            <td class="row">
                <label class="col-xs-12 col-sm-6 col-md-2 col-lg-2" style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Nao', ['class' => 'form-control']) !!} Não </label>
                <label class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Aguardo outros', ['class' => 'form-control']) !!} Aguardando outros </label>
                <label class="col-xs-12 col-sm-6 col-md-4 col-lg-3" style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Aguardo finanças', ['class' => 'form-control']) !!} Aguardando finanças </label>
                <label class="col-xs-12 col-sm-6 col-md-2 col-lg-1">{!! Form::radio('Resolvido', 'Sim', ['class' => 'form-control']) !!} Sim </label>
            </td>
        </div>
    </tr>

    <!-- Campo Submit  -->
    <tr>
        <td></td>
        <td></td>
        <div class="form-group">
            <td>
                <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Inserir</button>
                <a href="{!! route('agendas.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
            </td>
        </div>
    </tr>
</table>

