<div class="container formulario-padrao">
    <!-- Campo Nomeunidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('NomeUnidade', 'Unidade:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->NomeUnidade !!}</p>
    </div>

    <!-- Campo Cnpj -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CNPJ', 'CNPJ:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->CNPJ !!}</p>
    </div>

    <!-- Campo Endereco -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Endereco', 'Endereço:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Endereco !!}</p>
    </div>

    <!-- Campo Bairro -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Bairro', 'Bairro:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Bairro !!}</p>
    </div>

    <!-- Campo Cidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Cidade', 'Cidade:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Cidade !!}</p>
    </div>

    <!-- Campo Uf -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('UF', 'UF:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->UF !!}</p>
    </div>

    <!-- Campo Telefone1 -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Telefone1', 'Telefone 1:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Telefone1 !!}</p>
    </div>

    <!-- Campo Telefone2 -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Telefone2', 'Telefone 2:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Telefone2 !!}</p>
    </div>

    <!-- Campo Tipo -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Tipo', 'Tipo:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $unidade->Tipo !!}</p>
    </div>

    <!-- Campo Tipo -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Logotipo', 'Logotipo:') !!}</p>
        <p class="col-sm-12 col-md-9"><img src="../storage/{!! $unidade->Logotipo !!}" alt="Logotipo da Unidade"></p>
    </div>
</div>
