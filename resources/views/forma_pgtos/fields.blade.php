<div class="container formulario-padrao">
    <!-- Formapagamento Field -->
    <div class="row">
        <p class="col-sm-3 col-md-3 col-xs-12">{!! Form::label('FormaPagamento', 'Forma de pagamento:') !!}</p>
        <p class="col-sm-6 col-md-6 col-xs-12">{!! Form::text('FormaPagamento', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formaPgtos.index') !!}" class="btn btn-default">Cancel</a> --}}
        <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
            Salvar Forma de Pagamento</button>
        <a href="{!! route('formaPgtos.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                class="fa fa-close"></i> Cancelar</a>
    </div>
</div>
