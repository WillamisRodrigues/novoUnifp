<div class="container formulario-padrao">
    <!-- Nomeunidade Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('NomeUnidade', 'Unidade:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('NomeUnidade', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Cnpj Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('CNPJ', 'CNPJ:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('CNPJ', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Endereco Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Endereco', 'Endereço:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Endereco', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Bairro Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Bairro', 'Bairro:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Bairro', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Cidade Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Cidade', 'Cidade:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('Cidade', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Uf Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('UF', 'UF:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 select-conheceu">
            {!! Form::select('UF', array(
            'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas', 'BA' => 'Bahia', 'CE' => 'Ceará',
            'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo',
            'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul', 'MG' => 'Minas
            Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná',
            'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande de Norte', 'RS' => 'Rio
            Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina',
            'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins'
            ), ['class' => 'custom-select']) !!}
        </p>
    </div>
    <!-- Telefone1 Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin-top: 15px">{!! Form::label('Telefone1', 'Telefone 1:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">
            <div class="input-group" style="padding-right: 15px; padding-left: 15px; ">
                {!! Form::text('Telefone1', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon agenda-input-hora">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </p>
    </div>
    <!-- Telefone2 Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12" style="margin-top: 15px">{!! Form::label('Telefone2', 'Telefone 2:') !!}</p>
        <p class="col-md-8 col-sm-12">
            <div class="input-group" style="padding-right: 15px; padding-left: 15px; ">
                {!! Form::text('Telefone2', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon agenda-input-hora">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </p>
    </div>
    <!-- Tipo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Tipo', 'Tipo:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">
            <label>{!! Form::radio('Tipo', 'Propria', ['class' => 'form-control'])
                !!} <span class="input-radio-prioridade" style="background-color: white; color: black"> Própria </span>
            </label>
            <label>{!! Form::radio('Tipo', 'Franquia', ['class' => 'form-control'])
                !!} <span class="input-radio-prioridade" style="background-color: white; color: black"> Franquia </span>
            </label>
        </p>
    </div>
    <!-- Logotipo Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('Logotipo', 'Logotipo:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::file('Logotipo', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12"></p>
        <p class="col-md-8 col-sm-12"><button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Unidade</button>
            <a href="{!! route('unidades.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a></p>
    </div>
</div>
