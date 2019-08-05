<div class="container">

    <!-- Name Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('name', 'Name:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $usuario->name !!}</p>
    </div>

    <!-- Email Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('email', 'E-mail:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $usuario->email !!}</p>
    </div>

    <!-- Nascimento Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('nascimento', 'Data de Nascimento:') !!}</p>
        <p class="col-sm-12 col-md-8">
            {{-- {!! $usuario->nascimento !!} --}}
            {!! date('d/m/Y', strtotime($usuario->nascimento)); !!}
        </p>
    </div>

    <!-- Nivelacesso Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('nivelAcesso', 'Nivel Acesso:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $usuario->nivelAcesso !!}</p>
    </div>

    <!-- Unidadeescolar Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('unidadeEscolar', 'Unidade Escolar:') !!}</p>
        <p class="col-sm-12 col-md-8">{!! $usuario->unidadeEscolar !!}</p>
    </div>

</div>
