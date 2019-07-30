<div class="container">
    <div class="row">
        <!-- Nome Field -->
        <div class="form-group">
            {!! Form::label('Nome', 'Nome:') !!}
            <p>{!! $funcionario->Nome !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Nascimento Field -->
        <div class="form-group">
            {!! Form::label('Nascimento', 'Nascimento:') !!}
            <p>{!! $funcionario->Nascimento !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Estadocivil Field -->
        <div class="form-group">
            {!! Form::label('EstadoCivil', 'Estadocivil:') !!}
            <p>{!! $funcionario->EstadoCivil !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Celular Field -->
        <div class="form-group">
            {!! Form::label('Celular', 'Celular:') !!}
            <p>{!! $funcionario->Celular !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Telefonefixo Field -->
        <div class="form-group">
            {!! Form::label('TelefoneFixo', 'Telefonefixo:') !!}
            <p>{!! $funcionario->TelefoneFixo !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Email Field -->
        <div class="form-group">
            {!! Form::label('Email', 'Email:') !!}
            <p>{!! $funcionario->Email !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Cargo Field -->
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            <p>{!! $funcionario->Cargo !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Setor Field -->
        <div class="form-group">
            {!! Form::label('Setor', 'Setor:') !!}
            <p>{!! $funcionario->Setor !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Observacao Field -->
        <div class="form-group">
            {!! Form::label('Observacao', 'Observacao:') !!}
            <p>{!! $funcionario->Observacao !!}</p>
        </div>
    </div>

    <div class="row">
        <!-- Inativo Field -->
        <div class="form-group">
            {!! Form::label('Inativo', 'Inativo:') !!}
            <p>{!! $funcionario->Inativo !!}</p>
        </div>
    </div>

</div>
