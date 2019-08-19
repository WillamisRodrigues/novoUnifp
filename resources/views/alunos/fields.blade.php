@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
<script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script>
    $("input[id*='CpfAluno']").inputmask({
        mask: ['999.999.999-99'],
        keepStatic: true
    });
    $("input[id*='CpfContratante']").inputmask({
        mask: ['999.999.999-99'],
        keepStatic: true
    });
    $("input[id*='Telefone']").inputmask({
        mask: ['(99) 9999-9999'],
        keepStatic: true
    });
    $("input[id*='Celular1']").inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
    $("input[id*='Celular2']").inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
    $("input[id*='Celular2']").inputmask({
        mask: ['(99) 99999-9999'],
        keepStatic: true
    });
    $("input[id*='CEP']").inputmask({
        mask: ['99999-999'],
        keepStatic: true
    });
</script>
@endsection

{{-- <div class="container formulario-padrao"> --}}
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Aluno</a></li>
        <li><a href="#tab_2" data-toggle="tab">Contratante</a></li>
        <li><a href="#tab_3" data-toggle="tab">Curso</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
            <div class="container">
                <!-- Campo Nome -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Nome', 'Nome:') !!}<span
                            style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Nome', null, ['class' => 'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Sexo -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Sexo', 'Sexo:') !!}<span
                            style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-conheceu">
                        {!! Form::select('Sexo', array('Masculino' => 'Masculino', 'Feminino' => 'Feminino',)) !!}
                    </p>
                </div>

                <!-- Campo Nascimentoaluno -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('NascimentoAluno', 'Data de Nascimento:')
                        !!}<span style="color: red">*</span></p>
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::date('NascimentoAluno', null, ['class' => 'form-control', 'id' =>
                        'NascimentoAluno'])!!}
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>


                <!-- Campo Estadocivilaluno -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('EstadoCivilAluno', 'Estado Civil:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-conheceu">
                        {!! Form::select('EstadoCivilAluno', array('Solteiro' => 'Solteiro', 'Casado' => 'Casado',
                        'Divorciado' => 'Divorciado', 'Viuvo' => 'Viúvo',)) !!}
                    </p>
                </div>

                <!-- Campo Profissaoaluno -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('ProfissaoAluno', 'Profissão:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('ProfissaoAluno', null, ['class' =>
                        'form-control'])
                        !!}
                    </p>
                </div>

                <!-- Campo Rgaluno -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('RgAluno', 'RG:') !!}<span
                            style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('RgAluno', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Cpfaluno -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('CpfAluno', 'CPF:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('CpfAluno', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Escolaridade -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Escolaridade', 'Escolaridade:') !!}<span
                            style="color: red">*</span></p>
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group select-padrao"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        <select name="Escolaridade" id="Escolaridade" class="form-control">
                            @foreach($escolaridades as $escolaridade )
                            <option value="{{ $escolaridade->Escolaridade }}">{{ $escolaridade->Escolaridade }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-addon">
                            <i class="fa fa-graduation-cap" style="font-size: 1rem"></i>
                        </div>
                    </div>

                </div>

                <!-- Campo Email -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Email', 'E-mail:') !!}<span
                            style="color: red">*</span></p>
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::email('Email', null, ['class' => 'form-control', 'id' => 'Email']) !!}
                        <div class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </div>
                    </div>
                </div>
                <!-- Campo Mae -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Mae', 'Nome da Mãe:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Mae', null, ['class' => 'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Pai -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Pai', 'Nome do Pai:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Pai', null, ['class' => 'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Conheceu -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Conheceu', 'Como Conheceu:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        {{-- {!! Form::text('Conheceu', null, ['class' => 'form-control']) !!} --}}
                        <select name="Conheceu" id="Conheceu" style="width: 50%">
                            @foreach($conheceu as $modo )
                            <option value="{{ $modo->ComoConheceu }}">{{ $modo->ComoConheceu }}</option>
                            @endforeach
                        </select>
                        <a href="{!! route('comoConheceus.create') !!}" target="_blank"
                            class="btn btn-flat btn-light botao-mais"
                            style="color: black; border: 1px solid #33333333; border-radius: 2px"><i
                                class="fa fa-plus"></i></a>
                    </p>
                </div>

                <!-- Campo Vendedor -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Vendedor', 'Responsável pela venda:')
                        !!}<span style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        <select name="Vendedor" id="Vendedor" style="width: 50%">
                            @foreach($funcionarios as $vendedor )
                            <option value="{{ $vendedor->Nome }}">{{ $vendedor->Nome }}</option>
                            @endforeach
                        </select>
                        <a href="{!! route('funcionarios.create') !!}" target="_blank"
                            class="btn btn-flat btn-light botao-mais"
                            style="color: black; border: 1px solid #33333333; border-radius: 2px"><i
                                class="fa fa-plus"></i></a>
                    </p>
                </div>

                {!! Form::hidden('Usuario_id', '0') !!}

                <!-- Campo Datacadastro -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('DataCadastro', 'Data de Cadastro:') !!}<span
                            style="color: red">*</span></p>
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::date('DataCadastro', null, ['class' => 'form-control', 'id' =>
                        'DataCadastro'])!!}
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
            <div class="container">
                <!-- Campo Pagador -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Pagador', 'Nome do Pagador:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Pagador', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Parentesco -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Parentesco', 'Grau de Parentesco:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Parentesco', null, ['class' =>
                        'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Nascimentocontratante -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('NascimentoContratante', 'Data de
                        Nascimento:')
                        !!}<span style="color: red">*</span>
                    </p>
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::date('NascimentoContratante', null, ['class' => 'form-control', 'id' =>
                        'NascimentoContratante'])!!}
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </div>

                <!-- Campo Estadocivilcontratante -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('EstadoCivilContratante', 'Estado Civil:')
                        !!}<span style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-conheceu">
                        {!! Form::select('EstadoCivilContratante', array('Solteiro' => 'Solteiro', 'Casado' => 'Casado',
                        'Divorciado' => 'Divorciado', 'Viuvo' => 'Viúvo',)) !!}
                    </p>
                </div>

                <!-- Campo Profissaocontratante -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('ProfissaoContratante', 'Profissão:')
                        !!}<span style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('ProfissaoContratante', null, ['class' =>
                        'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Rgcontratante -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('RgContratante', 'RG:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('RgContratante', null, ['class' =>
                        'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Cpfcontratante -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('CpfContratante', 'CPF:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('CpfContratante', null, ['class' =>
                        'form-control'])
                        !!}
                    </p>
                </div>

                <!-- Campo Endereco -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Endereco', 'Endereço:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Endereco', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Bairro -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Bairro', 'Bairro:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Bairro', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Cidade -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Cidade', 'Cidade:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Cidade', null, ['class' => 'form-control'])
                        !!}</p>
                </div>

                <!-- Campo Uf -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('UF', 'UF:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-conheceu">
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

                <!-- Campo Cep -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('CEP', 'CEP:') !!}<span
                            style="color: red">*</span>
                    </p>
                    <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('CEP', null, ['class' => 'form-control']) !!}
                    </p>
                </div>

                <!-- Campo Telefone -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Telefone', 'Telefone:') !!}<span
                            style="color: red">*</span></p>
                    {{-- <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Telefone', null, ['class' => 'form-control']) !!}</p> --}}
                    <div class="col-xs-12 col-sm-6 col-md-6 input-group"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::text('Telefone', null, ['class' => 'form-control', 'id' => 'Telefone']) !!}
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                </div>

                <!-- Campo Celular1 -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Celular1', 'Celular 1:') !!}<span
                            style="color: red">*</span></p>
                    {{-- <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Celular1', null, ['class' => 'form-control']) !!}</p> --}}
                    <div class="input-group date col-xs-12 col-sm-6 col-md-6"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::text('Celular1', null, ['class' => 'form-control'])!!}
                        <div class="input-group-addon agenda-input-hora">
                            <i class="fa fa-mobile" style="font-size:2rem"></i>
                        </div>
                    </div>
                </div>

                <!-- Campo Celular2 -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Celular2', 'Celular 2:') !!}<span
                            style="color: red">*</span></p>
                    {{-- <p class="col-xs-12 col-sm-6 col-md-6">{!! Form::text('Celular2', null, ['class' => 'form-control']) !!}</p> --}}
                    <div class="input-group date col-xs-12 col-sm-6 col-md-6"
                        style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
                        {!! Form::text('Celular2', null, ['class' => 'form-control'])!!}
                        <div class="input-group-addon agenda-input-hora">
                            <i class="fa fa-mobile" style="font-size:2rem"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="tab_3">
            <div class="container">
                <!-- Campo Curso -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('idCurso', 'Curso:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        <select name="idCurso" id="idCurso" style="width: 50%">
                            @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nomeCurso }}</option>
                            @endforeach
                        </select>
                    </p>
                </div>

                <!-- Campo Turma -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('idTurma', 'Turma:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        <select name="idTurma" id="idTurma" style="width: 50%">
                            @foreach($turmas as $turma )
                                <option value="{{ $turma->id }}">
                                    {{ $turma->NomeTurma }}
                                </option>
                            @endforeach
                            </select>
                        </p>
                    </div>

                <!-- Campo Parcelamento -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('idParcelamento', 'Forma de Parcelamento:')
                        !!}<span style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        {{-- {!! Form::text('Parcelamento', null, ['class' => 'form-control']) !!} --}}
                        <select name="idParcelamento" id="idParcelamento" style="width: 50%">
                            @foreach($pagamentos as $pagamento )
                            <option value="{{ $pagamento->id }}">{{ $pagamento->QtdeParcelas }}x de
                            R${{ $pagamento->ParcelaBruta }},00 - Total = R${{ $pagamento->BrutoTotal }},00</option>
                            @endforeach
                        </select>
                    </p>
                </div>

                <!-- Campo Vencimento -->
                <div class="row">
                    <p class="col-xs-12 col-sm-3 col-md-3">{!! Form::label('Vencimento', 'Dia do Vencimento:') !!}<span
                            style="color: red">*</span></p>
                    <p class="col-xs-12 col-sm-6 col-md-6 select-padrao">
                        <select name="Vencimento" id="Vencimento" style="width: 50%">
                            @foreach($vencimentos as $vencimento )
                            <option value="{!! $vencimento->diaVencimento !!}">{!! $vencimento->diaVencimento !!}</option>
                            @endforeach
                        </select>
                        {{-- <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('Vencimento', '8', ['class' =>
                            'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Dia 8
                            </span>
                        </label> --}}
                    </p>
                </div>
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->
<!-- Campo Submit -->
<div class="row">
    <p class="col-xs-12 col-sm-3 col-md-3"></p>
    <p class="col-xs-12 col-sm-6 col-md-6">
        <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
            Salvar Aluno</button>
        <a href="{!! route('alunos.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                class="fa fa-close"></i> Cancelar</a>
    </p>
</div>
{{-- </div> --}}
