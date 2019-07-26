<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $agenda->id !!}</p>
</div>

<!-- Prioridade Field -->
<div class="form-group">
    {!! Form::label('prioridade', 'Prioridade:') !!}
    <p>{!! $agenda->prioridade !!}</p>
</div>

<!-- Data Field -->
<div class="form-group">
    {!! Form::label('Data', 'Data:') !!}
    <p>{!! $agenda->Data !!}</p>
</div>

<!-- Hora Field -->
<div class="form-group">
    {!! Form::label('Hora', 'Hora:') !!}
    <p>{!! $agenda->Hora !!}</p>
</div>

<!-- Assunto Field -->
<div class="form-group">
    {!! Form::label('Assunto', 'Assunto:') !!}
    <p>{!! $agenda->Assunto !!}</p>
</div>

<!-- Tarefa Field -->
<div class="form-group">
    {!! Form::label('Tarefa', 'Tarefa:') !!}
    <p>{!! $agenda->Tarefa !!}</p>
</div>

<!-- Resolvido Field -->
<div class="form-group">
    {!! Form::label('Resolvido', 'Resolvido:') !!}
    <p>{!! $agenda->Resolvido !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $agenda->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $agenda->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $agenda->deleted_at !!}</p>
</div>

