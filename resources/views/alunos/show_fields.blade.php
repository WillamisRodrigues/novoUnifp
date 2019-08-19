<div style="margin: 15px">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <!-- Campo Nome -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Nome', 'Nome:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Nome !!}</p>
            </div>

            <!-- Campo Sexo -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Sexo', 'Sexo:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Sexo !!}</p>
            </div>

            <!-- Campo Nascimentoaluno -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('NascimentoAluno', 'Data de Nascimento do Aluno:') !!}</p>
                <p class="col-sm-12 col-md-7">
                    {{-- {!! $aluno->NascimentoAluno !!} --}}
                    {!! date('d/m/Y', strtotime($aluno->Nascimento)); !!}
                </p>
            </div>

            <!-- Campo Estadocivilaluno -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('EstadoCivilAluno', 'Estado Civil do Aluno:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->EstadoCivilAluno !!}</p>
            </div>

            <!-- Campo Profissaoaluno -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('ProfissaoAluno', 'Profissão do Aluno:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->ProfissaoAluno !!}</p>
            </div>

            <!-- Campo Rgaluno -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('RgAluno', 'RG Aluno:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->RgAluno !!}</p>
            </div>

            <!-- Campo Cpfaluno -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('CpfAluno', 'CPF Aluno:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->CpfAluno !!}</p>
            </div>

            <!-- Campo Escolaridade -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Escolaridade', 'Escolaridade:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Escolaridade !!}</p>
            </div>

            <!-- Campo Email -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Email', 'E-mail:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Email !!}</p>
            </div>

            <!-- Campo Curso -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('idCurso', 'Curso:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->idCurso !!}</p>
            </div>

            <!-- Campo Turma -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('idTurma', 'Turma:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->idTurma !!}</p>
            </div>

            <!-- Campo Parcelamento -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('idParcelamento', 'Forma de Parcelamento:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->idParcelamento !!}</p>
            </div>

            <!-- Campo Vencimento -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Vencimento', 'Data do Vencimento:') !!}</p>
                <p class="col-sm-12 col-md-7">
                    {{-- {!! $aluno->Vencimento !!} --}}
                    {!! date('d/m/Y', strtotime($aluno->Vencimento)); !!}
                </p>
            </div>

            <!-- Campo Mae -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Mae', 'Mãe:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Mae !!}</p>
            </div>

            <!-- Campo Pai -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Pai', 'Pai:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Pai !!}</p>
            </div>

            <!-- Campo Conheceu -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Conheceu', 'Conheceu:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Conheceu !!}</p>
            </div>

            {{-- Campo Vendedor --}}
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Vendedor', 'Vendedor:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Vendedor !!}</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">

            <!-- Campo Datacadastro -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('DataCadastro', 'Data do Cadastro:') !!}</p>
                <p class="col-sm-12 col-md-7">
                    {{-- {!! $aluno->DataCadastro !!} --}}
                    {!! date('d/m/Y', strtotime($aluno->DataCadastro)); !!}
                </p>
            </div>

            <!-- Campo Parentesco -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Parentesco', 'Parentesco:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Parentesco !!}</p>
            </div>

            <!-- Campo Pagador -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Pagador', 'Pagador:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Pagador !!}</p>
            </div>

            <!-- Campo Nascimentocontratante -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('NascimentoContratante', 'Data de Nascimento do
                    Contratante:')
                    !!}</p>
                <p class="col-sm-12 col-md-7">
                    {{-- {!! $aluno->NascimentoContratante !!} --}}
                    {!! date('d/m/Y', strtotime($aluno->NascimentoContratante)); !!}
                </p>
            </div>

            <!-- Campo Estadocivilcontratante -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('EstadoCivilContratante', 'Estado Civil do Contratante:')
                    !!}
                </p>
                <p class="col-sm-12 col-md-7">{!! $aluno->EstadoCivilContratante !!}</p>
            </div>

            <!-- Campo Profissaocontratante -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('ProfissaoContratante', 'Profissão do Contratante:') !!}
                </p>
                <p class="col-sm-12 col-md-7">{!! $aluno->ProfissaoContratante !!}</p>
            </div>

            <!-- Campo Rgcontratante -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('RgContratante', 'RG do Contratante:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->RgContratante !!}</p>
            </div>

            <!-- Campo Cpfcontratante -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('CpfContratante', 'CPF do Contratante:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->CpfContratante !!}</p>
            </div>

            <!-- Campo Endereco -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Endereco', 'Endereço:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Endereco !!}</p>
            </div>

            <!-- Campo Bairro -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Bairro', 'Bairro:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Bairro !!}</p>
            </div>

            <!-- Campo Cidade -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Cidade', 'Cidade:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Cidade !!}</p>
            </div>

            <!-- Campo Uf -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('UF', 'UF:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->UF !!}</p>
            </div>

            <!-- Campo Cep -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('CEP', 'CEP:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->CEP !!}</p>
            </div>

            <!-- Campo Telefone -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Telefone', 'Telefone:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Telefone !!}</p>
            </div>

            <!-- Campo Celular1 -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Celular1', 'Celular 1:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Celular1 !!}</p>
            </div>

            <!-- Campo Celular2 -->
            <div class="row">
                <p class="col-sm-12 col-md-5">{!! Form::label('Celular2', 'Celular 2:') !!}</p>
                <p class="col-sm-12 col-md-7">{!! $aluno->Celular2 !!}</p>
            </div>
        </div>
    </div>
</div>
