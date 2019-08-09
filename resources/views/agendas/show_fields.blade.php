<div class="formulario-padrao">
    <!-- Prioridade Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('prioridade', 'Prioridade:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $agenda->Prioridade !!}</p>
    </div>

    <!-- Data Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Data', 'Data:') !!}</p>
        <p class="col-sm-12 col-md-9">
            {{-- {!! $agenda->Data !!} --}}
            {!! date('d/m/Y', strtotime($agenda->Data)); !!}
        </p>
    </div>

    <!-- Hora Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Hora', 'Hora:') !!}</p>
        <p class="col-sm-12 col-md-9">
                {!! date('H:m', strtotime($agenda->Hora)); !!}
        </p>
    </div>

    <!-- Assunto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Assunto', 'Assunto:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $agenda->Assunto !!}</p>
    </div>

    <!-- Tarefa Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Tarefa', 'Tarefa:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $agenda->Tarefa !!}</p>
    </div>


    <!-- Resolvido Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Resolvido', 'Resolvido:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $agenda->Resolvido !!}</p>
    </div>
</div>
