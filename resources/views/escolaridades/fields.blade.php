<!-- Escolaridade Field -->
<div class="form-group col-sm-6 row">
    <div class="col-md-3">{!! Form::label('Escolaridade', 'Escolaridade:') !!}<span style="color: red">*</span></div>
    <div class="col-md-9">{!! Form::text('Escolaridade', null, ['class' => 'form-control']) !!}</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i> Salvar Escolaridades</button>
    <a href="{!! route('escolaridades.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
</div>
