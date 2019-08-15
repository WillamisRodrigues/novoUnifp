@foreach ($alunos as $aluno)
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
                    {{-- {{ dd($unidades) }} --}}
                    {!! $unidades[0] !!}
                </td>
                <td>
                    CNPJ: {!! $unidades[1] !!}
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    Endereço: {!! $unidades[2] !!}, {!! $unidades[3] !!}, {!! $unidades[4] !!} - {!! $unidades[5] !!}
                </td>
            </tr>
            <tr>
                <td>
                    Telefone: {!! $unidades[6] !!}
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
                <td><span>Valor Total do Curso:</span><br> R$ {!! $parcelamentos[2] !!}</td>
                <td><span>Quantidade de Parcelas:</span><br>{!! $parcelamentos[0] !!} Vezes</td>
                <td><span>Valor de Cada Parcela:</span><br> R$ {!! $parcelamentos[1] !!}</td>
                <td><span>Desconto de Pontualidade:</span><br> R$ {!! $parcelamentos[3] !!}</td>
            </tr>
            <tr>
                <td colspan="2"><span>Mora Diára por Atraso de Pagamento:</span><br>R$ {!! '00,00' !!}</td>
                <td colspan="2"><span>Multa por Atraso do Pagamento:</span><br>R$ {!! '00,00' !!}</td>
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
                    {!! $cursos[0] !!}
                </td>
            </tr>
            <tr>
                <td><span>Quantidade Total de Aulas:</span><br>{!! $cursos[1] !!} aulas</td>
                <td><span>Duração de Cada Aula:</span><br>{!! $cursos[2]/$cursos[1] !!} horas</td>
                <td><span>Carga Horária Total do Curso:</span><br>{!! $cursos[2] !!} horas</td>
                <td><span>Matriculado na Turma:</span><br>{!! $turmas[0] !!}</td>
            </tr>
            <tr>
                <td><span>Início das Aulas:</span><br>{!! $turmas[1] !!}</td>
                <td><span>Período/Horário:</span><br>{!! $turmas[2] !!}</td>
                <td><span>Dias de Aula:</span><br>{!! $turmas[3] !!} dias</td>
                <td><span>Matriculado sob o número:</span><br>{!! $aluno->id !!}</td>
            </tr>
        </table>
    </div>
    <br>
    <div style="text-align: justify">
            <p><b>CLÁUSULA PRIMEIRA</b>: O BENEFICIÁRIO ingressará no programa de capacitação profissional em computação que será ministrado na Plataforma Futuro no Presente. </p>
            <p><b>CLÁUSULA SEGUNDA</b>: A duração deste programa de capacitação é de 18 (Dezoito) meses, dividido em 03(Três) unidades, com total de 144 (Cento e Quarenta e Quatro) horas aulas. </p>
            <br>
            <p><b>CLÁUSULA TERCEIRA</b>: As unidades e suas disciplinas estão dispostas das seguintes maneiras: UNIDADE DIGITAL ARTS: Editor de Imagem e Layout. UNIDADE GAMES: Lógica de Programação e Editor de Games. UNIDADE 3D: Software de modelagem e animação 3D. </p>
            <p><b>CLÁUSULA QUARTA</b>: O BENEFICIÁRIO irá receber o seu Login e Senha para acesso a plataforma www.fpeduc.com no ato da sua inscrição. </p>
            <p><b>CLÁUSULA QUINTA</b>: O material didático referente ao curso será disponibilizado na plataforma em sua turma. Os demais materiais didáticos serão entregues com o início das unidades subsequentes aos ADIMPLENTES. </p>
            <p><b>CLÁUSULA SEXTA</b>: A data de início do treinamento, bem como disciplinas, dias e horários das novas turmas, serão informadas ao Contratante e/ou Beneficiário através de circulares. </p>
            <p><b>CLÁUSULA SÉTIMA</b>: As aulas serão realizadas 1 vez por semana na unidade escolar e realizadas em uma sala com micro computadores, tantos quantos forem necessários para que não ultrapasse a razão de 01(um) aluno para cada computador. </p>
            <p><b>CLÁUSULA OITAVA</b>: A Escola promoverá avaliações para verificar o aproveitamento dos alunos, onde somente farão jus ao certificado, o aluno que estiver concluído o curso, possuir nota maior ou igual a 7,0 (sete) e freqüência maior que 75% (Setenta e cinco por cento) da carga horária do curso. </p>
            <p><b>CLÁUSULA NONA</b>: A FALTA DE FREQÜÊNCIA do aluno ao curso contratado, NÃO O EXIME DO PAGAMENTO DAS PARCELAS, tendo em vista a disponibilidade do serviço colocado ao contratante, salvo os casos de desistências formalmente requeridos através de protocolo. </p>
            <p><b>CLÁUSULA DÉCIMA</b>: Como contraprestação dos serviços a serem prestados pela UNIDADE ESCOLAR, o CONTRATANTE pagará no ato da assinatura do contrato, o valor de R$ 80,00 (Oitenta Reais) correspondente a matricula, a importância de R$ 600,00 (Seiscentos reais) referente ao material didático e a quantia de R$ 60,00 (sessenta reais) relativo às práticas pedagógicas, além de 17 (Dezessete) parcelas iguais, mensais e consecutivas de R$139,80 (Cento e Trinta e Nove Reais e Oitenta Centavos) referentes às 03 (três) UNIDADES descritas na CLÁUSULA TERCEIRA.Parágrafo Primeiro: A PRIMEIRA PARCELA SERÁ PAGA ANTECIPADAMENTE COMO RESERVA E SINAL DO NEGÓCIO, NÃO SENDO DEVOLVIDA SOB HIPÓTESE ALGUMA.Parágrafo Segundo: As demais parcelas serão devidas no mês subsequente ao início do curso, e terão como vencimento sucessivo os dias 8 (oito) de cada mês. </p>
            <p><b>CLÁUSULA DÉCIMA PRIMEIRA</b>: Através do P.I.Q ( PROGRAMA DE INCENTIVO À QUALIFICAÇÃO)., este CONTRATANTE está sendo beneficiado pelo SISTEMA DE BOLSA e portanto, ficará isento das taxas de matricula, material didático e práticas pedagógicas. Além disso, como BOLSISTA, fará jus a um desconto de 50% (cinquenta por cento) reduzindo no valor da Matrícula de R$ 40,00 ( Quarenta Reais) mensalidade, reduzindo o valor das 17( Dezoito) parcelas iguais, mensais e consecutivas para a quantia de R$ 69,90 (Sessenta e Nove Reais e Noventa Centavos). Parágrafo Segundo: As demais parcelas terão início no mês subseqüente ao início do curso e terão como vencimento todo dia 08(Oito) de cada mês com um bônus de R$ 10,00 (Dez reais) sobre as mesmas.</p>
            <p><b>CLÁUSULA DÉCIMA SEGUNDA</b>: Os valores acima poderão sofrer reajustes caso ocorra mudanças na realidade econômica do país, como inflação ou outra forma de desvalorização monetária, sendo nestes casos aplicados os índices de reajustes mensais ou em outra periodicidade que mantenha o equilíbrio econômico do contrato.</p>
            <p><b>CLÁUSULA DÉCIMA TERCEIRA</b>: RESCISÃO CONTRATUAL, No caso de desistência ou rescisão somente poderá ser solicitadas pelos contratantes que estiverem com o pagamento das parcelas em dia e através de comunicação por escrito para a secretaria da contratada com antecedência mínima de 15 (quinze) dias. pagará multa de 10% do valor das parcelas remanescente, como Cláusula penal compensatória prevista no artigo 408 e seguintes do Código Civil. </p>
            <p><b>CLÁUSULA DÉCIMA QUARTA</b>: Não fica caracterizado como rescisão do contrato ou suspensão da prestação de serviço, o abandono das aulas ou a falta de ingresso em uma turma após o término de uma disciplina por meio do aluno. </p>
            <p><b>CLÁUSULA DÉCIMA QUINTA</b>: Caso haja redução da turma em 50% (cinquenta por cento) por desistência ou outro motivo qualquer, haverá remanejamento da mesma para outros dias e horários, não sendo este motivo para rescisão contratual por culpa do contratado. </p>
            <p><b>CLÁUSULA DÉCIMA SEXTA</b>: O CONTRATANTE se obriga a comunicar à CONTRATADA a eventual mudança de endereço, através de requerimento protocolizado no Atendimento ao Cliente da unidade, bem como atualizar seus dados cadastrais sempre que houver alguma alteração.</p>
            <p><b>CLÁUSULA DÉCIMA SÉTIMA</b>: A CONTRATADA não se responsabilizará perante o CONTRATANTE por qualquer perda, danos, extravio ou furto de objetos e/ou veículos em suas dependências.</p>
            <p><b>CLÁUSULA DÉCIMA OITAVA</b>: Não será permitido acompanhante de qualquer idade em sala de aula, salvo as pessoas com deficiência(s), mediante comprovação e autorização antecipada da gerência da unidade educativa onde as despesas com acompanhante ou intérprete será por parta da CONTRATANTE.</p>
            <p><b>CLÁUSULA DÉCIMA NONA</b> : Não é permitida a entrada e a permanência de pessoas portando qualquer tipo de armas, bebidas alcoólicas e substâncias proibidas por lei nas dependências da CONTRATADA. Parágrafo primeiro: o aluno beneficiário deste contrato deverá observar os princípios, comportamento e conduta ética, moral, disciplinar e de respeito às normas de boa convivência coletiva e a qualquer integrante da comunidade escolar, necessários e compatíveis ao desenvolvimento da educação e ensino, sob pena de expulsão do estabelecimento de ensino, fazendo assim o termino de contrato isentando a contratada de qualquer valor de taxas ou multas.A instituição possui exposto na entrada dos laboratórios o manual de regras das dependências da unidade FP para apreciação de qualquer aluno ou responsável. </p>
            <p><b>CLÁUSULA VIGÉSIMA</b>: O atraso no pagamento das mensalidades importará em multa de 2%(dois por cento) sobre a parcela devida, juros de mora de 0,33% (zero virgula trinta e três por cento) pro rata dia e correção monetária, podendo o contratante inscrever o nome do devedor no serviço de Proteção ao Crédito (SPC) e SERASA. </p>
            <p><b>CLÁUSULA VIGÉSIMA PRIMEIRA</b>: Havendo inadimplemento no pagamento das parcelas, eventualmente, tendo a CONTRATADA se utilizada de serviços advocatícios para a cobrança de valores em aberto, o CONTRATANTE pagará honorários advocatícios extrajudiciais em percentual não superior a 10% (dez por cento) do valor total do débito, nos termos do at. 4º, 6º - III, 54, parágrafo 4º da lei 8.078/90 (CDC) e art. 22 lei 8906/94, podendo a CONTRATADA, socorrer-se de todos os meios legais necessários à satisfação de seus direitos. </p>
            <p><b>CLÁUSULA VIGÉSIMA SEGUNDA</b>: O contratante afirma, neste ato, que LEU E ENTENDEU CLARAMENTE o presente contrato e todas suas cláusulas, concordando e aceitando todos os seus termos. </p>
            <p><b>CLÁUSULA VIGÉSIMA TERCEIRA</b>: As partes contratantes elegem o foro da cidade da assinatura deste contrato para o fim de dirimir qualquer ação oriunda do presente contrato.E para firmeza e como prova de haverem contratado, fizeram este instrumento particular, impresso em duas vias de igual teor e forma, assinado pelas partes contratantes e pelas testemunhas abaixo, a tudo presentes.</p>
            <p class="float-right">
                {!! 'Fortaleza - CE, 00/00/0000' !!}
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

@endforeach
