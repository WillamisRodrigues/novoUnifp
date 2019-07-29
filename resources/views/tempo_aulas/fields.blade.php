<!-- Tempoaula Field -->
<div class="form-group col-sm-6 row">
    <div class="col-md-3">{!! Form::label('tempoAula', 'Tempoaula:') !!}</div>
    <div class="col-md-9">{!! Form::text('tempoAula', null, ['class' => 'form-control']) !!}</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar Tempo de Aula</button>
    <a href="{!! route('tempoAulas.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
</div>
