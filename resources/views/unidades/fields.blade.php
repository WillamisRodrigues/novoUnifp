@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
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

{{-- <div class="container formulario-padrao"> --}}
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Dados da Escola</a></li>
        <li><a href="#tab_2" data-toggle="tab">Contrato 1</a></li>
        <li><a href="#tab_3" data-toggle="tab">Contrato 2</a></li>
        <li><a href="#tab_4" data-toggle="tab">Multa</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <!-- Nomeunidade Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('NomeUnidade', 'Unidade:')
                    !!}<span style="color: red">*</span>
                </p>
                <p class="col-md-9 col-sm-12">{!! Form::text('NomeUnidade', null, ['class' => 'form-control']) !!}
                </p>
            </div>
            <!-- Cnpj Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('CNPJ', 'CNPJ:') !!}<span
                        style="color: red">*</span>
                </p>
                <p class="col-md-9 col-sm-12">{!! Form::text('CNPJ', null, ['class' => 'form-control']) !!}</p>
            </div>
            <!-- Endereco Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Endereco', 'Endereço:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-9 col-sm-12">{!! Form::text('Endereco', null, ['class' => 'form-control']) !!}</p>
            </div>
            <!-- Bairro Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Bairro', 'Bairro:') !!}<span
                        style="color: red">*</span>
                </p>
                <p class="col-md-9 col-sm-12">{!! Form::text('Bairro', null, ['class' => 'form-control']) !!}</p>
            </div>
            <!-- Cidade Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Cidade', 'Cidade:') !!}<span
                        style="color: red">*</span>
                </p>
                <p class="col-md-9 col-sm-12">{!! Form::text('Cidade', null, ['class' => 'form-control']) !!}</p>
            </div>
            <!-- Uf Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('UF', 'UF:') !!}<span
                        style="color: red">*</span></p>
                <p class="col-md-9 col-sm-12 select-conheceu">
                    {!! Form::select('UF', array(
                    'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas', 'BA' => 'Bahia', 'CE' =>
                    'Ceará',
                    'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo',
                    'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul', 'MG'
                    => 'Minas
                    Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná',
                    'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande de Norte',
                    'RS' => 'Rio
                    Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina',
                    'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins'
                    ), ['class' => 'custom-select']) !!}
                </p>
            </div>
            <!-- Telefone1 Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12" style="margin-top: 15px">{!!
                    Form::label('Telefone1', 'Telefone
                    1:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-9 col-sm-12">
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
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12" style="margin-top: 15px">{!!
                    Form::label('Telefone2', 'Telefone
                    2:')
                    !!}</p>
                <p class="col-md-9 col-sm-12">
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
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Tipo', 'Tipo:') !!}<span
                        style="color: red">*</span>
                </p>
                <p class="col-md-9 col-sm-12">
                    <label>{!! Form::radio('Tipo', 'Propria', ['class' => 'form-control'])
                        !!} <span class="input-radio-prioridade" style="background-color: white; color: black">
                            Própria </span>
                    </label>
                    <label>{!! Form::radio('Tipo', 'Franquia', ['class' => 'form-control'])
                        !!} <span class="input-radio-prioridade" style="background-color: white; color: black">
                            Franquia </span>
                    </label>
                </p>
            </div>
            <!-- Logotipo Field -->
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Logotipo', 'Logotipo:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-9 col-sm-12">{!! Form::file('Logotipo', null, ['class' => 'form-control']) !!}</p>
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Contrato1', 'Texto de
                    Contrato:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Contrato1', null, ['class' => 'form-control editor1'])
                    !!}</p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Assinatura1', 'Área de
                    Assinatura:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Assinatura1', null, ['class' => 'form-control
                    editor2']) !!}
                </p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Valores1', 'Valores e
                    Condições de
                    Pagamento:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Valores1', null, ['class' => 'form-control editor3'])
                    !!}</p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Matricula1', 'Valor da
                    Matrícula:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('Matricula1', null, ['class' => 'form-control']) !!}</p>
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_3">
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Contrato2', 'Texto de
                    Contrato:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Contrato2', null, ['class' => 'form-control editor4'])
                    !!}</p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Assinatura2', 'Área de
                    Assinatura:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Assinatura2', null, ['class' => 'form-control
                    editor5']) !!}
                </p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Valores2', 'Valores e
                    Condições de
                    Pagamento:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Valores2', null, ['class' => 'form-control editor6'])
                    !!}</p>
            </div>
            <div class="row">
                <p class="col-md-3 alinhar-esquerda text-right col-sm-12">{!! Form::label('Matricula2', 'Valor da
                    Matrícula:') !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('Matricula2', null, ['class' => 'form-control']) !!}</p>
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_4">
            <div class="row">
                <p class="col-md-2 col-sm-12 alinhar-esquerda text-right">{!! Form::label('Prestadora', 'Prestadora:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::textarea('Prestadora', null, ['class' => 'form-control
                    editor7']) !!}
                </p>
            </div>
            <div class="row">
                <p class="col-md-2 col-sm-12 alinhar-esquerda text-right">{!! Form::label('MultaContrato', 'Valor da
                    Multa (contrato):')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('MultaContrato', null, ['class' => 'form-control']) !!}
                </p>
            </div>
            <div class="row">
                <p class="col-md-2 col-sm-12 alinhar-esquerda text-right">{!! Form::label('MoraContrato', 'Valor da Mora
                    (contrato):')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('MoraContrato', null, ['class' => 'form-control']) !!}
                </p>
            </div>
            <div class="row">
                <p class="col-md-2 col-sm-12 alinhar-esquerda text-right">{!! Form::label('Multa', 'Valor da Multa:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('Multa', null, ['class' => 'form-control']) !!}</p>
            </div>
            <div class="row">
                <p class="col-md-2 col-sm-12 alinhar-esquerda text-right">{!! Form::label('Mora', 'Valor da Mora:')
                    !!}<span style="color: red">*</span></p>
                <p class="col-md-8 col-sm-12">{!! Form::number('Mora', null, ['class' => 'form-control']) !!}</p>
            </div>

        </div>

        <!-- /.tab-pane -->

        <!-- /.tab-pane -->
    </div>
    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12"></p>
        <p class="col-md-8 col-sm-12">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Unidade</button>
            <a href="{!! route('unidades.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </p>
    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
