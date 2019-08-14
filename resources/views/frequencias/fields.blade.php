<!-- Idaluno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAluno', 'Idaluno:') !!}
    {!! Form::number('idAluno', null, ['class' => 'form-control']) !!}
</div>

<!-- Idturma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idTurma', 'Idturma:') !!}
    {!! Form::number('idTurma', null, ['class' => 'form-control']) !!}
</div>

<!-- Idaula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idAula', 'Idaula:') !!}
    {!! Form::number('idAula', null, ['class' => 'form-control']) !!}
</div>

<!-- Frequencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Frequencia', 'Frequencia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('Frequencia', 0) !!}
        {!! Form::checkbox('Frequencia', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('frequencias.index') !!}" class="btn btn-default">Cancel</a>
</div>
