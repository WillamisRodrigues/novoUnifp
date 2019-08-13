@foreach ($alunos as $aluno)

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Carnê de pagamentos</title>
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
    </style>
</head>

<body>
    <table class="width: 100%">
        <tr>
            <td colspan="7"><p class="text-center text-uppercase">Carnê de Pagamento</p></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">Recibo do Sacado</td>
            <td rowspan="6"></td>
            <td colspan="3">Estabelecimento: {!! 'nome da unidade' !!}</td>
            <td>Vencimento: 0{!! $aluno->Vencimento !!}/00/0000</td>
        </tr>
        <tr>
            <td>Matrícula</td>
            <td>{!! '000000 - nome do aluno' !!}</td>
            <td colspan="3">Aluno: {!! '000000 - nome do aluno' !!}</td>
            <td>Valor do Doc.: R$ {!! '00,00' !!}</td>
        </tr>
        <tr>
            <td>Carnê/Folha</td>
            <td>Nª. 000000</td>
            <td>Multa por atraso<br> <span class="text-right">10%</span> </td>
            <td>Data da Emissão<br> <span class="text-right">00/00/0000</span> </td>
            <td>Controle </td>
            <td>Parcela Nº.<br> <span class="text-right">01/18</span> </td>
        </tr>
        <tr>
            <td>Vencimento</td>
            <td>00/00/0000</td>
            <td colspan="3">Intruções: cobrar R$0,30 juros ao dia</td>
            <td>Carnê/Folha <br> <span class="text-right">Nº. 000000</span></td>
        </tr>
        <tr>
            <td>Valor</td>
            <td>R$ 00,00</td>

        </tr>
        <tr>
            <td>Valor Cobrado</td>
            <td></td>
        </tr>
        <tr>
            <td>Data de Pgto:</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
    </table>

</body>

</html>

@endforeach
