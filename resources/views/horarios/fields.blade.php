<!-- Horario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Horario', 'Horario:') !!}
    {!! Form::text('Horario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('horarios.index') !!}" class="btn btn-default">Cancel</a> --}}
    <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
        Salvar
        Horário</button>
    <a href="{!! route('horarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
        Cancelar</a>
</div>
