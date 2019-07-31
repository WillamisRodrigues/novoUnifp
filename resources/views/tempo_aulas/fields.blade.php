<!-- Tempoaula Field -->
<div class="form-group col-sm-6 row">
    <div class="col-md-3">{!! Form::label('tempoAula', 'Tempo de Aula:', ['style' => 'font-size: 1.31rem']) !!}<span style="color: red">*</span></div>
    <div class="col-md-9">{!! Form::text('tempoAula', null, ['class' => 'form-control']) !!}</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i class="fa fa-save"></i> Salvar Tempo de Aula</button>
    <a href="{!! route('tempoAulas.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
</div>
