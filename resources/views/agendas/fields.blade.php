<table class="table">
    <tr>
        <td></td>
    <!-- Prioridade Field -->
        <div class="radio">
            <td style="width: 15rem"><p style="font-weight: bold"> Prioridade<span style="color: red">*</span></p></td>
            <td>
                <label>{!! Form::radio('prioridade', 'Baixa', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: green"> Baixa </span> </label>
                <label>{!! Form::radio('prioridade', 'Média', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: orange"> Média </span> </label>
                <label>{!! Form::radio('prioridade', 'Alta', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: red"> Alta </span> </label>
            </td>
        </div>
    </tr>
    <tr>
        <td></td>
        <!-- Data Field -->
        <div class="form-group">
            <td style="width: 15rem">{!! Form::label('Data', 'Data') !!}<span style="color: red">*</span>:</td>
            <td>
                <div class="input-group date" style="width: 5rem">
                    {!! Form::date('Data', null, ['class' => 'form-control','id'=>'datepicker']) !!}
                    <div class="input-group-addon">
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
                showInputs: false
            })
        </script>
    @endsection

    <!-- Hora Field -->
    <tr>
        <td></td>
        <!-- time Picker -->
        <div class="bootstrap-timepicker">
            <div class="form-group">
                <td style="width: 15rem">
                    {!! Form::label('Hora', 'Horario') !!}<span style="color: red">*</span>:
                </td>
                <td>
                    <div class="input-group" style="width: 21.2rem">
                        {!! Form::text('Hora', null, ['class' => 'form-control timepicker']) !!}
                        <div class="input-group-addon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                </td>
            </div>
        </div>
    </tr>

    <!-- Assunto Field -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Assunto', 'Assunto:') !!}<span style="color: red">*</span>:
            </td>
            <td>{!! Form::text('Assunto', null, ['class' => 'form-control', 'style' => 'width: 50rem']) !!}</td>
        </div>
    </tr>

    <!-- Tarefa Field -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Tarefa', 'Tarefa:') !!}<span style="color: red">*</span>:
            </td>
            <td>
                {!! Form::textarea('Tarefa', null, ['class' => 'form-control', 'style' => 'width: 50rem', 'height: 10rem']) !!}
            </td>
        </div>
    </tr>

    <!-- Resolvido Field -->
    <tr>
        <td></td>
        <div class="form-group">
            <td style="width: 15rem">
                {!! Form::label('Resolvido', 'Resolvido:') !!}<span style="color: red">*</span>:
            </td>
            <td>
                <label style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Nao', ['class' => 'form-control']) !!} Não </label>
                <label style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Outros', ['class' => 'form-control']) !!} Aguardando outros </label>
                <label style="padding-right: 2rem">{!! Form::radio('Resolvido', 'Financas', ['class' => 'form-control']) !!} Aguardando finanças </label>
                <label>{!! Form::radio('Resolvido', 'Sim', ['class' => 'form-control']) !!} Sim </label>
            </td>
        </div>
    </tr>

    <!-- Submit Field -->
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

