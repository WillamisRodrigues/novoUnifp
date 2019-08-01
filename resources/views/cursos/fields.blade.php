<div class="container formulario-padrao">
    <!-- Campo Nome do Curso -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('nomeCurso', 'Nome do Curso:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::text('nomeCurso', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Quantidade de Aulas -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('QtdeAulas', 'Quantidade de Aulas:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('QtdeAulas', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Carga Horária -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CargaHoraria', 'Carga Horária:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('CargaHoraria', null, ['class' => 'form-control']) !!}</p>
    </div>

    {{-- <!-- Campo para escolher Forma de Pagamento -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CargaHoraria', 'Carga Horária:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::number('CargaHoraria', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo para escolher Avaliações -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CargaHoraria', 'Carga Horária:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::number('CargaHoraria', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo para escolher Turmas Ativas -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CargaHoraria', 'Carga Horária:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::number('CargaHoraria', null, ['class' => 'form-control']) !!}</p>
    </div> --}}

    <!-- Campo Submit -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i>
                Salvar
                Curso</button>
            <a href="{!! route('cursos.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
