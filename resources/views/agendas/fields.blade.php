<!-- Prioridade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prioridade', 'Prioridade:') !!}
    {!! Form::text('prioridade', null, ['class' => 'form-control']) !!}
</div>

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
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agendas.index') !!}" class="btn btn-default">Cancel</a>
</div>
