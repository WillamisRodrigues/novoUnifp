<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $visitante->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $visitante->nome !!}</p>
</div>

<!-- Telefone Field -->
<div class="form-group">
    {!! Form::label('telefone', 'Telefone:') !!}
    <p>{!! $visitante->telefone !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $visitante->email !!}</p>
</div>

<!-- Observacao Field -->
<div class="form-group">
    {!! Form::label('observacao', 'Observacao:') !!}
    <p>{!! $visitante->observacao !!}</p>
</div>

<!-- Dataretorno Field -->
<div class="form-group">
    {!! Form::label('dataRetorno', 'Dataretorno:') !!}
    <p>{!! $visitante->dataRetorno !!}</p>
</div>

<!-- Horaretorno Field -->
<div class="form-group">
    {!! Form::label('horaRetorno', 'Horaretorno:') !!}
    <p>{!! $visitante->horaRetorno !!}</p>
</div>

<!-- Comoconheceu Field -->
<div class="form-group">
    {!! Form::label('comoConheceu', 'Comoconheceu:') !!}
    <p>{!! $visitante->comoConheceu !!}</p>
</div>

<!-- Dataatendimento Field -->
<div class="form-group">
    {!! Form::label('dataAtendimento', 'Dataatendimento:') !!}
    <p>{!! $visitante->dataAtendimento !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $visitante->status !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $visitante->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $visitante->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $visitante->deleted_at !!}</p>
</div>

