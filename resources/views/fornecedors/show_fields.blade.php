<div class="container formulario-padrao">
    <!-- Campo Fornecedor -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Fornecedor', 'Fornecedor:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Fornecedor !!}</p>
    </div>

    <!-- Campo Nome Fantasia -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('NomeFantasia', 'Nome Fantasia:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->NomeFantasia !!}</p>
    </div>

    <!-- Campo CNPJ -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CNPJ', 'CNPJ:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->CNPJ !!}</p>
    </div>

    <!-- Campo Endereço -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Endereco', 'Endereço:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Endereco !!}</p>
    </div>

    <!-- Campo Bairro -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Bairro', 'Bairro:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Bairro !!}</p>
    </div>

    <!-- Campo Cidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Cidade', 'Cidade:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Cidade !!}</p>
    </div>

    <!-- Campo UF -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('UF', 'UF:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->UF !!}</p>
    </div>

    <!-- Campo E-mail -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Email', 'E-mail:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Email !!}</p>
    </div>

    <!-- Campo Telefone -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Telefone1', 'Telefone:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Telefone1 !!}</p>
    </div>

    <!-- Campo Telefone 2 -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Telefone2', 'Telefone 2:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Telefone2 !!}</p>
    </div>

    <!-- Campo Pessoa para Contato -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('PessoaContato', 'Pessoa para Contato:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->PessoaContato !!}</p>
    </div>

    <!-- Campo Observação -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Observacao', 'Observação:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! $fornecedor->Observacao !!}</p>
    </div>

    <!-- Campo Data de Cadastro -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DataCadastro', 'Data de Cadastro:') !!}</p>
        <p class="col-sm-12 col-md-9">
            {{-- {!! $fornecedor->DataCadastro !!} --}}
            {!! date('d/m/Y', strtotime($fornecedor->DataCadastro)); !!}
        </p>
    </div>
</div>
