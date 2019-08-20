<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Recibo de Pagamento</title>
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

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <div style="margin-top: 2%">
        <div class="" style="width: 30%; float: left">
            <img src="https://i.ibb.co/YpMcYrB/fp.jpg" alt="Gracom Logo" style="width: 60%; margin: 2% 20%;">
        </div>
        <div class="" style="width: 60%; float:right; margin-left: 10%">
            <b>{!! $unidade->NomeUnidade !!}<br>
                {!! $unidade->Endereco !!}</b><br>
            {!! $unidade->Bairro !!} - {!! $unidade->Cidade !!} - {!! $unidade->UF !!}<br>
            {!! $unidade->CNPJ !!}<br>
            {!! $date !!}
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <h3 class="text-center"><b><u>Recibo Nº {!! $recibo->numeroDocumento !!}</u></b></h3>
        <h3 class="text-right"><b>R$ {!! $recibo->Valor !!}</b></h3>
        <p style="font-size: 1.3rem">Recebemos de {!! $aluno->Pagador !!} a quantia de
            {!! $valorExtenso !!} referente a parcela {!!
            $recibo->Parcela !!}/{!! 'total' !!} do aluno <b>{!! $aluno->Nome !!}</b> - Contrato número: <b>{!! $aluno->id !!}</b>.
        </p>
        <p class="text-right">{!! $unidade->Cidade." - ".$unidade->UF.", ".$dateExtenso."."!!}</p>
        <p class="text-right">_________________________________________________ <br> {!! $unidade->NomeUnidade !!} -
            CNPJ: {!! $unidade->CNPJ !!}</p>
    </div>
    <div style="border-top: 2px dotted black; height: 20px"></div>
    <div style="margin-top: 2%">
        <div class="" style="width: 30%; float: left">
            <img src="https://i.ibb.co/YpMcYrB/fp.jpg" alt="Gracom Logo" style="width: 60%; margin: 2% 20%;">
        </div>
        <div class="" style="width: 60%; float:right; margin-left: 10%">
            <b>{!! $unidade->NomeUnidade !!}<br>
                {!! $unidade->Endereco !!}</b><br>
            {!! $unidade->Bairro !!} - {!! $unidade->Cidade !!} - {!! $unidade->UF !!}<br>
            {!! $unidade->CNPJ !!}<br>
            {!! $date !!}
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <h3 class="text-center"><b><u>Recibo Nº {!! $recibo->numeroDocumento !!}</u></b></h3>
        <h3 class="text-right"><b>R$ {!! $recibo->Valor !!}</b></h3>
        <p style="font-size: 1.3rem">Recebemos de {!! $aluno->Pagador !!} a quantia de
            {!! $valorExtenso !!} referente a parcela {!!
            $recibo->Parcela !!}/{!! 'total' !!} do aluno <b>{!! $aluno->Nome !!}</b> - Contrato número: <b>{!! $aluno->id !!}</b>.
        </p>
        <p class="text-right">{!! $unidade->Cidade." - ".$unidade->UF.", ".$dateExtenso."."!!}</p>
        <p class="text-right">_________________________________________________ <br> {!! $unidade->NomeUnidade !!} -
            CNPJ: {!! $unidade->CNPJ !!}</p>
    </div>

</body>

</html>
