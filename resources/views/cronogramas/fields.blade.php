<div class="container formulario-padrao">
    <!-- Nome Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Nome', 'Nome:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::text('Nome', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Aulascronograma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('AulasCronograma', 'Cronograma de Aulas:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::text('AulasCronograma', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-md-6">
            {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('cronogramas.index') !!}" class="btn btn-default">Cancel</a> --}}
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar
                Visitante</button>
            <a href="{!! route('cronogramas.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
