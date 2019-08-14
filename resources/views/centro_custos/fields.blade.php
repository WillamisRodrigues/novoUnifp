<div class="container formulario-padrao">
    <!-- Centrocusto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CentroCusto', 'Centro de Custo:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::text('CentroCusto', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3"></p>
        <p class="col-sm-12 col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar
                Centro de Custo</button>
            <a href="{!! route('centroCustos.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat">
                <i class="fa fa-close"></i>
                Cancelar</a>
        </p>
    </div>
</div>
