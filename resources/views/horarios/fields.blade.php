<div class="container formulario-padrao">
    <!-- Horario Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Horario', 'Horário:') !!}<span style="color: red">*</span></p>
        <p class="col-xs-12 col-sm-6">{!! Form::text('Horario', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Horário</button>
            <a href="{!! route('horarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
