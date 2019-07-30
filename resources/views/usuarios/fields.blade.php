<div class="container formulario-padrao">
    <!-- Name Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('name', 'Name:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('name', null, ['class' => 'form-control', ])!!}</p>
        <!-- Email Field -->
    </div>
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('email', 'Email:') !!}</p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::email('email', null, ['class' => 'form-control','id'=>'datepicker']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-at"></i>
            </div>
        </div>
        <!-- Nascimento Field -->
    </div>
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('nascimento', 'Nascimento:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::date('nascimento', null, ['class' => 'form-control','id'=>'nascimento',
            ]) !!}</p>

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

    <!-- Nivelacesso Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('nivelAcesso', 'Nivel de Acesso:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::number('nivelAcesso', null, ['class' => 'form-control']) !!}</p>
        <!-- Unidadeescolar Field -->
    </div>
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('unidadeEscolar', 'Unidade Escolar:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::text('unidadeEscolar', null, ['class' => 'form-control']) !!}</p>

    </div>
    <!-- Password Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('password', 'Senha:') !!}</p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-lock"></i>
            </div>
        </div>
        <!-- Submit Field -->
    </div>
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12"></p>
        <p class="col-md-8 col-sm-12 col-xs-12">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> SalvarUsuário</button>
            <a href="{!! route('usuarios.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </p>
    </div>
</div>
