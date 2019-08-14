<div class="container formulario-padrao">
    <!-- Nomecurso Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('nomeCurso', 'Nome do Curso:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $curso->nomeCurso !!}</p>
    </div>

    <!-- Qtdeaulas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('QtdeAulas', 'Quantidade de Aulas:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $curso->QtdeAulas !!}</p>
    </div>

    <!-- Cargahoraria Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CargaHoraria', 'Carga Horária:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $curso->CargaHoraria !!}</p>
    </div>
</div>
