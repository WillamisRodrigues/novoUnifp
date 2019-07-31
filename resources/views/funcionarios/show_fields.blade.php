<div class="container formulario-padrao">
    <div class="row">
        <!-- Nome Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Nome', 'Nome:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Nome !!}</p>
    </div>

    <div class="row">
        <!-- Nascimento Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Nascimento', 'Data de Nascimento:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Nascimento !!}</p>
    </div>



    <div class="row">
        <!-- Celular Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Celular', 'Celular:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Celular !!}</p>
    </div>

    <div class="row">
        <!-- Telefonefixo Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('TelefoneFixo', 'Telefone Fixo:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->TelefoneFixo !!}</p>
    </div>

    <div class="row">
        <!-- Email Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Email', 'E-mail:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Email !!}</p>
    </div>

    <div class="row">
        <!-- Cargo Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Cargo', 'Cargo:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Cargo !!}</p>
    </div>

    <div class="row">
        <!-- Setor Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Setor', 'Setor:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Setor !!}</p>
    </div>

    <div class="row">
        <!-- Estadocivil Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('EstadoCivil', 'Estado Civil:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->EstadoCivil !!}</p>
    </div>

    <div class="row">
        <!-- Observacao Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Observacao', 'Observação:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Observacao !!}</p>
    </div>

    <div class="row">
        <!-- Inativo Field -->
        <p class="col-sm-12 col-md-3">{!! Form::label('Inativo', 'Inativo:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $funcionario->Inativo !!}</p>
    </div>

</div>
