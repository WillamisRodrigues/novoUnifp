<div class="container formulario-padrao">
    <!-- Diassemana Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DiasSemana', 'Dia de Aula:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-6">{!! Form::text('DiasSemana', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Dia de Aula</button>
            <a href="{!! route('diasSemanas.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
