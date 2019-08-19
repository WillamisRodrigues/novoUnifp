<div class="container formulario-padrao">
    <!-- Idaluno Field -->
    {{-- <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('idAluno', 'Idaluno:') !!}</p>
    </div> --}}
    {!! Form::hidden('idAluno', $matricula) !!}

    <!-- Comunicado Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('Comunicado', 'Comunicado:') !!}</p>
        <p class="col-xs-12 col-sm-6">{!! Form::textarea('Comunicado', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3"></p>{{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comunicados.index') !!}" class="btn btn-default">Cancel</a> --}}
        <p class="col-xs-12 col-sm-6">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar Comunicado</button>
            <a href="{!! route('comunicados.show', [$matricula]) !!}" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </p>
    </div>
</div>
