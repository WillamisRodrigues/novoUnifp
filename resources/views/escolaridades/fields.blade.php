<!-- Escolaridade Field -->
<div class="form-group col-sm-6 row">
    <div class="col-md-3">{!! Form::label('Escolaridade', 'Escolaridade:') !!}</div>
    <div class="col-md-9">{!! Form::text('Escolaridade', null, ['class' => 'form-control']) !!}</div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Salvar Escolaridade', ['class' => 'btn btn-success btn-flat']) !!}
    <a href="{!! route('escolaridades.index') !!}" class="btn btn-default btn-flat">Cancelar</a> --}}
    <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar Escolaridades</button>
    <a href="{!! route('escolaridades.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i> Cancelar</a>
</div>
