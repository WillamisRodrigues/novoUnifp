<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>UniFP - @yield('title','Futuro no Presente')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ url('imagens/icons/icon-fp.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/main.css') }}">

    <style>
        .bg-vermelho-redondo {
            background-color: #CC403C;
            border-radius: 10px;
            padding: 2px 4px;
            text-align: center;
            color: white;
            font-weight: 600
        }
    </style>

</head>

<body>

    <table class="table display" id="alunos-table">
        <thead>
            <tr>
                <th class="text-center">Quantidade de Recebimentos</th>
                <th>Valor Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">{!! $qtdeAtrasado !!}</td>
                <td>R$ {!! number_format($somaAtrasado, 2, ',', '.') !!}</td>
                <td>
                    <p class="bg-vermelho-redondo">Vencido</p>
                </td>
            </tr>
            <tr>
                <td class="text-center">{!! $qtdeAberto !!}</td>
                <td>R$ {!! number_format($somaAberto, 2, ',', '.') !!}</td>
                <td>
                    <p class="bg-vermelho-redondo" style="background-color: #00A65A">Aberto</p>
                </td>
            </tr>
            <tr>
                <td class="text-center">{!! $qtdeQuitado !!}</td>
                <td>R$ {!! number_format($somaQuitado, 2, ',', '.') !!}</td>
                <td>
                    <p class="bg-vermelho-redondo" style="background-color: #777777">Quitado</p>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- jQuery 3.1.1 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
