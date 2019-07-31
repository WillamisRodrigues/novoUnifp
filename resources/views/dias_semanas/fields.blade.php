<!-- Diassemana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DiasSemana', 'Dia de Aula:') !!}
    {!! Form::text('DiasSemana', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
        Salvar
        Dia de Aula</button>
    <a href="{!! route('diasSemanas.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
        Cancelar</a>
</div>
