<!DOCTYPE html>
@php
    $i = 1;
@endphp
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Carnê de pagamentos {!! $aluno->Nome !!}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-size: 0.9rem
        }

        td {
            border: 1px solid black;
            font-size: 0.8rem;
            padding: 2px 4px;
        }

        table {
            border: 2px solid black;
        }

        .page-break{
            page-break-after: always;
        }
    </style>
</head>

<body>

    @foreach ($boletos as $boleto)
        <table class='width: 100%;'>
            <tr>
                <td colspan='7'>
                    <p class='text-center text-uppercase' style="font-weight: bolder; font-size:1.5rem">Carnê de Pagamento
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center; font-weight:bold'>Recibo do Sacado</td>
                <td rowspan='7' style="width: 2.5%"></td>
                <td colspan='3'><span style='font-weight:bold'>Estabelecimento:</span> {!! $unidade->NomeUnidade !!} </td>
                <td><span style='font-weight:bold'>Vencimento</span>: {!! date('d/m/Y', strtotime($boleto->Vencimento)); !!}</td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 13%">Matrícula</td>
                <td> {!! str_pad($aluno->id, 8, '0', STR_PAD_LEFT) !!} - {!! $aluno->Nome !!}</td>
                <td colspan='3'><span style='font-weight:bold'>Aluno</span>: {!! str_pad($aluno->id, 8, '0', STR_PAD_LEFT) !!} - {!! $aluno->Nome !!}</td>
                <td><span style='font-weight:bold'>Valor do Doc.</span>: R$ {!! number_format($boleto->Valor, 2, ',', '.') !!} </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Carnê/Folha</td>
                <td>Nª. {!! str_pad($boleto->numeroDocumento, 8, '0', STR_PAD_LEFT) !!}</td>
                <td><span>Multa por atraso</span><br> <span class='text-right'>10%</span> </td>
                <td><span>Data da Emissão</span><br> <span class='text-right'>{!! date('d/m/Y'); !!}</span> </td>
                <td style="width: 7%"><span>Controle </span><br></td>
                <td><b>Parcela Nº.</b><br> <span class='text-right'> {!!$i!!} / {!! $parcelamento->QtdeParcelas !!}</span> </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Vencimento</td>
                <td>{!! date('d/m/Y', strtotime($boleto->Vencimento)); !!}</td>
                <td colspan='3'>Instruções: cobrar R$0,30 juros ao dia</td>
                <td><b>Carnê/Folha</b> <br> <span class='text-right'>Nº. {!! str_pad($boleto->numeroDocumento, 8, '0', STR_PAD_LEFT) !!}</span></td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor</td>
                <td>R$ {!! number_format($boleto->Valor, 2, ',', '.') !!}</td>
                <td colspan='3'><span style="font-weight: bolder">Sacador</span>: {!! $aluno->Pagador !!}</td>
                <td><b>Valor cobrado:</b> </td>
            </tr>
            <tr>
                <td class="font-weight-bold">Valor Cobrado</td>
                <td></td>
                <td colspan='3' rowspan="2"><span style="font-weight: bolder">Via do estabelecimento</span></td>
                <td rowspan="2"><b>Data de pgto.:</b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="font-weight-bold">Data de Pgto</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
        </table>
        @if($i % 3 != 0)
            <br>
            <div style="border-top: dotted 2px #555555;"></div>
            <br>
        @else
            <div class="page-break"></div>
        @endif
        @php
            $i++;
        @endphp
    @endforeach
</body>

</html>
