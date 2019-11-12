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
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $("input[id*='TelefoneFixo']").inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
    $("input[id*='Celular']").inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
</script>
@endsection

<div class="container formulario-padrao">
    <!-- Nome Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Nome', 'Nome:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Nome', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Nascimento Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Nascimento', 'Data de Nascimento:')
            !!}<span style="color: red">*</span></p>
        <div class="input-group date col-md-8 col-sm-12" style="width:40%; padding-left: 15px">
            {!! Form::date('Nascimento', null, ['class' => 'form-control ','id'=>'Nascimento'])!!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Celular Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Celular', 'Celular:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-md-8 col-sm-12">
            {!! Form::text('Celular', null, ['class' => 'form-control']) !!}
        </p> --}}
        <div class="input-group date col-md-8 col-sm-12" style="width:40%; padding-left: 15px">
            {!! Form::text('Celular', null, ['class' => 'form-control'])!!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-mobile" style="font-size:2rem"></i>
            </div>
        </div>
    </div>

    <!-- Telefonefixo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('TelefoneFixo', 'Telefone Fixo:')
            !!}<span style="color: red">*</span></p>
        {{-- <p class="col-md-8 col-sm-12">{!! Form::text('TelefoneFixo', null, ['class' => 'form-control']) !!}</p> --}}
        <div class="input-group date col-md-8 col-sm-12" style="width:40%; padding-left: 15px">
            {!! Form::text('TelefoneFixo', null, ['class' => 'form-control'])!!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-phone"></i>
            </div>
        </div>
    </div>

    <!-- Email Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Email', 'E-mail:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-md-8 col-sm-12">{!! Form::email('Email', null, ['class' => 'form-control']) !!}</p> --}}
        <div class="input-group date col-md-8 col-sm-12" style="width:40%; padding-left: 15px">
            {!! Form::email('Email', null, ['class' => 'form-control'])!!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-at"></i>
            </div>
        </div>
    </div>

    <!-- Cargo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Cargo', 'Cargo:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">
            @if(isset($_SERVER['HTTP_REFERER']) and (strpos( $_SERVER['HTTP_REFERER'], 'vendedores-lista' ) or strpos( $_SERVER['HTTP_REFERER'], 'alunos/create' )) )
            {!! Form::text('Cargo', 'Vendedor', ['class' => 'form-control', 'readonly']) !!}
            @elseif(isset($_SERVER['HTTP_REFERER']) and strpos( $_SERVER['HTTP_REFERER'], 'professores-lista' ) )
            {!! Form::text('Cargo', 'Professor', ['class' => 'form-control', 'readonly']) !!}
            @else
            {!! Form::text('Cargo', null, ['class' => 'form-control']) !!}
            @endif
        </p>
    </div>

    <!-- Setor Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Setor', 'Setor:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Setor', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Estadocivil Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('EstadoCivil', 'Estado Civil:') !!}</p>
        <p class="col-md-8 col-sm-12 select-conheceu">
            {!! Form::select('EstadoCivil', array('Solteiro' => 'Solteiro', 'Casado' => 'Casado', 'Viuvo' => 'Viúvo',
            'Divorciado' => 'Divorciado')) !!}
        </p>
    </div>

    <!-- Observacao Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Observacao', 'Observação:') !!}</p>
        <p class="col-md-8 col-sm-12">{!! Form::textarea('Observacao', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Inativo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin: 10px 0px">{!! Form::label('Inativo', 'Status:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 select-conheceu">
            {!! Form::select('Inativo', array('Nao' => 'Ativo', 'Sim' => 'Inativo')) !!}
        </p>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4"></p>
        <p class="col-md-8 col-sm-12">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar
                Funcionário</button>
            <a href="{!! route('funcionarios.index') !!}" class="btn btn-danger btn-flat" style="margin-bottom: 1rem">
                <i class="fa fa-close"></i>
                Cancelar</a></p>
    </div>
</div>
