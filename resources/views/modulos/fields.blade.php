<div class="container formulario-padrao">
    <!-- Nomemodulo Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('nomeModulo', 'Nome do módulo:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-8">{!! Form::text('nomeModulo', null, ['class' => 'form-control']) !!}</p>
    </div>

    <input type="hidden" name="idCurso" id="idCurso" value="{!! $idCurso !!}">

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i>
                Salvar
                Módulo</button>
            <a href="{!! route('modulos.show', [$idCurso]) !!}" style="margin-bottom: 1rem"
                class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
