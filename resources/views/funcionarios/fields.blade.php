<div class="container formulario-padrao">
    <!-- Nome Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Nome', 'Nome:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Nome', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Nascimento Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Nascimento', 'Nascimento:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::date('Nascimento', null, ['class' => 'form-control','id'=>'Nascimento'])
            !!}</p>
    </div>

    @section('scripts')
    <script src="{{ url('js/datepicker.js') }}"></script>
    <script src="{{ url('js/timepicker.js') }}"></script>
    <script>
        //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        timeFormat: 'HH:mm:ss'
    })
    </script>
    @endsection

    <!-- Estadocivil Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('EstadoCivil', 'Estadocivil:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('EstadoCivil', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Celular Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Celular', 'Celular:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Celular', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Telefonefixo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('TelefoneFixo', 'Telefonefixo:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('TelefoneFixo', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Email Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Email', 'Email:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::email('Email', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Cargo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Cargo', 'Cargo:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Cargo', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Setor Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Setor', 'Setor:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Setor', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Observacao Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Observacao', 'Observacao:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::textarea('Observacao', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Inativo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Inativo', 'Inativo:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Inativo', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4"></p>
        <p class="col-md-8 col-sm-12">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar
                Funcionário</button>
            <a href="{!! route('funcionarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a></p>
    </div>
</div>
