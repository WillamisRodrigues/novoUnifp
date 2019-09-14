<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UniFP - Termo de Cancelamento</title>
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

    <img src="{!! $unidade->Logotipo !!}" alt="" style="margin-left: 70%">
    <h2 class="text-center font-weight-bold">Termo de Cancelamento</h2>
    <hr style="border: 1px #11111166 solid;">
    <div style="margin-top: 10%">
        <p class="text-justify">Pelo presente, eu, <b>{!! $aluno->Nome !!}</b>, CPF <b>{!! $aluno->CpfAluno !!}</b>, solicito o cancelamento de minha matrícula <b>{!! str_pad($aluno->id, 8, '0', STR_PAD_LEFT) !!}</b> no curso <b>{!! $curso->nomeCurso !!}</b> , Motivo: <b>desistência</b> e estou ciente do pagamento de 10% das parcelas remanescentes referente à multa de cancelamento.</p>
        <p class="float-right" style="margin-top: 5%">
            {!! $unidade->Cidade !!} - {!! $unidade->UF !!}, {!! date('d') !!} de
            @php
                $mes = date('m');
                switch ($mes) {
                    case '1':
                        echo 'Janeiro';
                        break;
                    case '2':
                        echo 'Fevereiro';
                        break;
                    case '3':
                        echo 'Março';
                        break;
                    case '4':
                        echo 'Abril';
                        break;
                    case '5':
                        echo 'Maio';
                        break;
                    case '6':
                        echo 'Junho';
                        break;
                    case '7':
                        echo 'Julho';
                        break;
                    case '8':
                        echo 'Agosto';
                        break;
                    case '9':
                        echo 'Setembro';
                        break;
                    case '10':
                        echo 'Outubro';
                        break;
                    case '11':
                        echo 'Novembro';
                        break;
                    case '12':
                        echo 'Dezembro';
                        break;
                }
            @endphp
            de {!! date('Y') !!}
        </p>
    </div>
    <div class="clearfix"></div>
    <div class="text-center" style="margin-top: 25%">
        _____________________________________________ <br>
        Assinatura do aluno ou responsável<br><br><br>
        _____________________________________________<br>
        Unidade
    </div>

</body>

</html>
