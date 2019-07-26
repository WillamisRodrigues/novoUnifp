<!-- Prioridade Field -->
<div class="radio col-sm-6">
    {!! Form::label('prioridade', 'Prioridade:') !!}
    <label>{!! Form::radio('prioridade', 'Baixa', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: green"> Baixa </span> </label>
    <label>{!! Form::radio('prioridade', 'Média', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: orange"> Média </span> </label>
    <label>{!! Form::radio('prioridade', 'Alta', ['class' => 'form-control']) !!} <span class="input-radio-prioridade" style="background-color: red"> Alta </span> </label>
</div>
{{--
    <div class="radio">
        <label>
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
        Option one is this and that&mdash;be sure to include why it's great
        </label>
    </div> --}}

<!-- Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Data', 'Data:') !!}
    {!! Form::date('Data', null, ['class' => 'form-control','id'=>'Data']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#Data').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Hora', 'Hora:') !!}
    {!! Form::text('Hora', null, ['class' => 'form-control']) !!}
</div>

<!-- Assunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Assunto', 'Assunto:') !!}
    {!! Form::text('Assunto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tarefa Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Tarefa', 'Tarefa:') !!}
    {!! Form::textarea('Tarefa', null, ['class' => 'form-control']) !!}
</div>

<!-- Resolvido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Resolvido', 'Resolvido:') !!}
    {!! Form::text('Resolvido', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Inserir', ['class' => 'btn btn-primary']) !!} --}}
    <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-save"></i> Inserir</button>
    <a href="{!! route('agendas.index') !!}" class="btn btn-default btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
</div>
