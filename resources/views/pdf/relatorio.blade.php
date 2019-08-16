<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Relatório de Lançamentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-size: 0.9rem
        }

        /* td {
            border: 1px solid black;
            font-size: 0.8rem;
            padding: 2px 4px;
        }

        table {
            border: 2px solid black;
        } */

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <table class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Via</th>
                <th>Forma</th>
                <th>Situação</th>
                <th>Descrição</th>
                <th>Aluno</th>
                <th>Data de Lançamento</th>
                <th>Data de Vencimento</th>
                <th>Valor</th>
                <th>Conta Caixa</th>
                <th>Centro Custo</th>
                <th>Usuário</th>
                <th>Data/Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caixas as $caixa)
            <tr>
                <td>{!! $caixa->Tipo !!}</td>
                <td>{!! $caixa->Via !!}</td>
                <td>{!! $caixa->FormaPgto !!}</td>
                <td>
                    @switch($caixa->Status)
                    @case("Pago")
                    {!! "Pago" !!}
                    @break
                    @case("FaltaPagar")
                    {!! "Aguardando Pagamento" !!}
                    @break
                    @default
                    {!! "Sem status definido" !!}
                    @endswitch
                </td>
                <td>{!! $caixa->Descricao !!}</td>
                <td>{!! $caixa->Aluno !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($caixa->Lancamento)); !!}
                </td>
                <td>
                    {!! date('d/m/Y', strtotime($caixa->Vencimento)); !!}
                </td>
                <td>R$ {!! $caixa->Valor !!}</td>
                <td>{!! $caixa->ContaCaixa !!}</td>
                <td>{!! $caixa->CentroCusto !!}</td>
                <td>{!! $caixa->Usuario !!}</td>
                <td>
                    {!! date('H:m:s d/m/Y', strtotime($caixa->Data)); !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
