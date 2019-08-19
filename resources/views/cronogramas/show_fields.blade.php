<div class="container formulario-padrao">

    <!-- Nome Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Nome', 'Nome:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $cronograma->Nome !!}</p>
    </div>

    <!-- Aulascronograma Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('idAulasCronograma', 'Cronograma de Aulas:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $cronograma->idAulasCronograma !!}</p>
    </div>

</div>
