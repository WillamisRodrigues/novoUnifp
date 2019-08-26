<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Contrato de Prestação de Serviços</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-size: 1rem
        }

        td {
            border: 1px solid black;
            font-size: 0.8rem;
            padding: 2px 4px;
        }
        span{
            font-weight: bold;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <div>
        <h3 class="text-center text-uppercase">Contrato de Prestação de Serviços</h3>
    </div>
    <br>
    <div>
        <h6>01 - Da Identificação do Aluno</h6>
        <table style="width: 100%">
            <tr>
                <td style="width: 65%"><span>Nome Completo:</span><br> {!! $aluno->Nome !!}</td>
                <td><span>Sexo:</span><br> {!! $aluno->Sexo !!}</td>
                <td><span>Data de Nascimento:</span><br> {!! date('d/m/Y', strtotime($aluno->NascimentoAluno)) !!}</td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <h6>02 - Da Identificação do Responsável Pagador deste Contrato</h6>
        <table style="width: 100%">
            <tr>
                <td style="width: 40%"><span>Nome Completo:</span><br> {!! $aluno->Nome !!}</td>
                <td><span>Sexo:</span><br> {!! $aluno->Sexo !!}</td>
                <td><span>Estado Civil:</span><br> {!! $aluno->EstadoCivilContratante !!}</td>
                <td><span>CPF:</span><br> {!! $aluno->CpfContratante !!}</td>
            </tr>
            <tr>
                <td colspan='2'><span>Residente:</span><br>{!! $aluno->Endereco !!} - {!! $aluno->Bairro !!}, {!! $aluno->Cidade !!} - {!! $aluno->UF !!}</td>
                <td><span>E-mail:</span><br>{!! $aluno->Email !!}</td>
                <td><span>Profissão:</span><br>{!! $aluno->ProfissaoContratante !!}</td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <h6>03 - Da Identificação da Prestadora de Serviços</h6>
        <table style="width: 100%">
            <tr>
                <td>
                    {!! $unidade->NomeUnidade !!}
                </td>
                <td>
                    CNPJ: {!! $unidade->CNPJ !!}
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    Endereço: {!! $unidade->Endereco !!}, {!! $unidade->Bairro !!}, {!! $unidade->Cidade !!} - {!! $unidade->UF !!}
                </td>
            </tr>
            <tr>
                <td>
                    Telefone: {!! $unidade->Telefone1 !!}
                </td>
                <td>
                    Site: {!! 'www.siteDaEscola.com.br' !!}
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <h6>04 - Do valor do Contrato e das Condições de Pagamento</h6>
        <table style="width: 100%">
            <tr>
                <td><span>Valor Total do Curso:</span><br> R$ {!! $parcelamentos->BrutoTotal !!}</td>
                <td><span>Quantidade de Parcelas:</span><br>{!! $parcelamentos->QtdeParcelas !!} parcelas</td>
                <td><span>Valor de Cada Parcela:</span><br> R$ {!! $parcelamentos->ParcelaBruta !!}</td>
                <td><span>Desconto de Pontualidade:</span><br> R$ {!! $parcelamentos->DescontoPontualidade !!}</td>
            </tr>
            <tr>
                <td colspan="2"><span>Mora Diára por Atraso de Pagamento:</span><br>R$ {!! $contrato->Mora !!}</td>
                <td colspan="2"><span>Multa por Atraso do Pagamento:</span><br>R$ {!! $contrato->Multa !!}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <span>Valor e Condições de Pagamento:</span><br>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div>
        <h6>05 - Da Identificação do Curso Contratado</h6>
        <table style="width: 100%">
            <tr>
                <td colspan="4">
                    <span>Curso Contratado: </span><br>
                    {!! $cursos->nomeCurso !!}
                </td>
            </tr>
            <tr>
                <td><span>Quantidade Total de Aulas:</span><br>{!! $cursos->QtdeAulas !!} aulas</td>
                <td><span>Duração de Cada Aula:</span><br>{!! $cursos->CargaHoraria/$cursos->QtdeAulas !!} horas</td>
                <td><span>Carga Horária Total do Curso:</span><br>{!! $cursos->CargaHoraria !!} horas</td>
                <td><span>Matriculado na Turma:</span><br>{!! $turmas->NomeTurma !!}</td>
            </tr>
            <tr>
                <td><span>Início das Aulas:</span><br>{!! date('d/m/Y', strtotime($turmas->DataInicio)) !!}</td>
                <td><span>Período/Horário:</span><br>{!! $turmas->Periodo !!}</td>
                <td><span>Dias de Aula:</span><br>{!! $turmas->DiasDaSemana !!} dias</td>
                <td><span>Matriculado sob o número:</span><br>{!! $aluno->id !!}</td>
            </tr>
        </table>
    </div>
    <br>
    <div style="text-align: justify">
           {!! $contrato->Contrato !!}
            <p class="float-right">
                {!!  $unidade->Cidade !!} - {!! $unidade->UF !!}, {!! $dataAgora !!}
            </p>
    </div>
    <div style="clear:both"></div>
    <br>
    <div>
        <div style="width: 50%; float:left">
            ______________________________________<br>
            Contratante:<br>
            {!! $aluno->Pagador !!}<br>
            CPF: {!! $aluno->CpfContratante !!}
        </div>
        <div style="width: 50%; float:right">
            ______________________________________<br>
            Contratada:<br>
            {!! 'nome da escola' !!}<br>
            CNPJ: {!! 'cnpj da escola' !!}
        </div>
    </div>
    <div style="clear:both"></div>
    <br>
    <div>
        <div style="width: 50%; float:left">
            ______________________________________<br>
            Testemunha 1<br>
        </div>
        <div style="width: 50%; float:right">
            ______________________________________<br>
            Testemunha 2<br>
        </div>
    </div>

</body>
</html>


