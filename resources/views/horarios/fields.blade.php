<!-- Horario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Horario', 'Horario:') !!}<span style="color: red">*</span>
    {!! Form::text('Horario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
        Salvar
        Horário</button>
    <a href="{!! route('horarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
        Cancelar</a>
</div>
