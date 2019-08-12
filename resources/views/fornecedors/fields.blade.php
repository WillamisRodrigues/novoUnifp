@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            timeFormat: 'HH:mm:ss'
        })
        $("input[id*='CNPJ']").inputmask({
            mask: ['99.999.999/9999-99'],
            keepStatic: true
        });
        $("input[id*='Telefone1']").inputmask({
            mask: ['(99) 9999-9999'],
            keepStatic: true
        });
        $("input[id*='Telefone2']").inputmask({
            mask: ['(99) 9999-9999'],
            keepStatic: true
        });
</script>
@endsection
<div class="container formulario-padrao">
    <!-- Campo Fornecedor -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Fornecedor', 'Fornecedor:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-9">{!! Form::text('Fornecedor', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Nome Fantasia -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('NomeFantasia', 'Nome Fantasia:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! Form::text('NomeFantasia', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo CNPJ -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('CNPJ', 'CNPJ:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! Form::text('CNPJ', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Endereço -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Endereco', 'Endereço:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-9">{!! Form::text('Endereco', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Bairro -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Bairro', 'Bairro:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! Form::text('Bairro', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Cidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Cidade', 'Cidade:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! Form::text('Cidade', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo UF -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('UF', 'UF:') !!}</p>
        <p class="col-sm-12 col-md-9 select-conheceu">
            {{-- {!! Form::text('UF', null, ['class' => 'form-control']) !!} --}}
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

    <!-- Campo E-mail -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 15px 0 0 0">{!! Form::label('Email', 'E-mail:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-9">
            <div class="input-group" style="width: 50%; padding-right: 15px; padding-left: 15px;">
                {!! Form::email('Email', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                </div>
            </div>
        </p>
    </div>

    <!-- Campo Telefone -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin:15px 0 0 0">{!! Form::label('Telefone1', 'Telefone:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-9">
            <div class="input-group" style="width: 50%; padding-right: 15px; padding-left: 15px;">
                {!! Form::text('Telefone1', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </p>
    </div>

    <!-- Campo Telefone 2 -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin:15px 0 0 0">{!! Form::label('Telefone2', 'Telefone 2:') !!}</p>
        <p class="col-sm-12 col-md-9">
            {{-- {!! Form::text('Telefone2', null, ['class' => 'form-control']) !!} --}}
            <div class="input-group" style="width: 50%; padding-right: 15px; padding-left: 15px;">
                {!! Form::text('Telefone2', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </p>
    </div>

    <!-- Campo Pessoa para Contato -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('PessoaContato', 'Pessoa Contato:') !!}
        </p>
        <p class="col-sm-12 col-md-9">{!! Form::text('PessoaContato', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Observação -->
    <div class="row">
        <p class="col-sm-12 col-md-3" style="margin: 10px 0px">{!! Form::label('Observacao', 'Observação:') !!}</p>
        <p class="col-sm-12 col-md-9">{!! Form::textarea('Observacao', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Campo Data de Cadastro -->
    <div class="row">
        <p class="col-md-3 col-sm-12" style="margin: 15px 0 0 0">{!! Form::label('DataCadastro', 'Data de
            Cadastro') !!}<span style="color: red">*</span>:</p>
        <p class="col-md-9 col-sm-12">
            <div class="input-group date" style="width: 50%; padding-right: 15px; padding-left:15px;">
                {!! Form::date('DataCadastro', null, ['class' => 'form-control ','id'=>'DataCadastro'])!!}
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </p>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-9">
            <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
                Salvar Fornecedor</button>
            <a href="{!! route('fornecedors.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </div>
    </div>
</div>
