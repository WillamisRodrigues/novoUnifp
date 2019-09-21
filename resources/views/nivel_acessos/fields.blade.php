<div class="container formulario-padrao">
    <!-- Name Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('name', 'Nome do perfil:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('name', null, ['class' => 'form-control', ])!!}</p>
    </div>

    <!-- Name Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('description', 'Descrição do perfil:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('description', null, ['class' => 'form-control', ])!!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12"></p>
        <p class="col-md-8 col-sm-12 col-xs-12">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar Perfil</button>
            <a href="{!! route('nivelAcessos.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat">
                <i class="fa fa-close"></i> Cancelar</a>
        </p>
    </div>
</div>
