<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;



class PdfController extends Controller
{
    //
    public function index()
    {
        return view('pdf.index');
    }
    public function gerarCarne($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id)->first();
        $boletos = DB::table('pagamentos')->get()->where('Matricula', $id);
        $idParcelamento = $aluno->idCurso;
        $formas_parcelamentos = DB::table('formas_pagamento')->where([['idCurso', '=', $aluno->idCurso], ['deleted_at', '=', null],])->get()->first();
        $idUnidade = UnidadeController::getUnidade();
        $unidades = DB::table('unidade')->get()->where('id', $idUnidade)->first();

        $pdf = PDF::loadView('pdf.carne', ['aluno' => $aluno, 'unidade' => $unidades, 'boletos' => $boletos, 'parcelamento' => $formas_parcelamentos]);
        return $pdf->stream('invoice.pdf');;
    }

    public function gerarContrato($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id)->first();
        $idUnidade = UnidadeController::getUnidade();
        $idCurso = $aluno->idCurso;
        $idTurma = $aluno->idTurma;

        //pegar dados das tabelas com base nos relacionamentos
        $unidades = DB::table('unidade')->get()->where('id', $idUnidade)->first();
        // $formas_parcelamentos = DB::table('formas_pagamento')->get()->where('id', $idParcelamento)->first();
        $cursos = DB::table('curso')->get()->where('id', $idCurso)->first();
        $formas_parcelamentos = DB::table('formas_pagamento')->get()->where('idCurso', $idCurso)->first();
        $turmas = DB::table('turma')->get()->where('id', $idTurma)->first();
        $contrato = DB::table('contratos')->get()->where('idCurso', $idCurso)->first();
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y');

        $pdf = PDF::loadView('pdf.contrato', ['aluno' => $aluno, 'cursos' => $cursos, 'unidade' => $unidades, 'parcelamentos' => $formas_parcelamentos, 'turmas' => $turmas, 'contrato' => $contrato, 'dataAgora' => $date]);
        return $pdf->stream('invoice.pdf');
    }

    public function gerarRelatorio()
    {
        $viewRelatorio = view('pdf.relatorio');
        $dados = DB::table('caixa')->get();
        $pdf = PDF::loadView('pdf.relatorio', ['caixas' => $dados])->setPaper('a3', 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    public function exportarRecebimentos()
    {

        $unidade = UnidadeController::getUnidade();
        $hoje = date('Y-m-d');
        $quitado = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['Status', '=', 'Quitado']])->get();
        $atrasado = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['Status', '<>', 'Quitado'], ['Vencimento', '<', $hoje]])->get();
        $aberto = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['Status', '<>', 'Quitado'], ['Vencimento', '>=', $hoje]])->get();

        $somaQuitado = 0;
        $qtdeQuitado = 0;
        foreach ($quitado as $boleto) {
            $somaQuitado = $somaQuitado + $boleto->Valor;
            $qtdeQuitado++;
        }
        $somaAtrasado = 0;
        $qtdeAtrasado = 0;
        foreach ($atrasado as $boleto) {
            $somaAtrasado = $somaAtrasado + $boleto->Valor;
            $qtdeAtrasado++;
        }
        $somaAberto = 0;
        $qtdeAberto = 0;
        foreach ($aberto as $boleto) {
            $somaAberto = $somaAberto + $boleto->Valor;
            $qtdeAberto++;
        }

        $dados = DB::table('caixa')->get();
        $pdf = PDF::loadView('pdf.recebimentos', ['somaQuitado' => $somaQuitado,'qtdeQuitado' => $qtdeQuitado,'somaAtrasado' => $somaAtrasado,'qtdeAtrasado' => $qtdeAtrasado,'somaAberto' => $somaAberto,'qtdeAberto' => $qtdeAberto]);
        return $pdf->stream('invoice.pdf');
    }

    public function exportarPrevisao(){
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos');
        $pgJan = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-01-01" and Vencimento < "2019-01-31"', [$unidade]);
        $pgFev = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-02-01" and Vencimento < "2019-02-31"', [$unidade]);
        $pgMar = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-03-01" and Vencimento < "2019-03-31"', [$unidade]);
        $pgAbr = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-04-01" and Vencimento < "2019-04-31"', [$unidade]);
        $pgMai = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-05-01" and Vencimento < "2019-05-31"', [$unidade]);
        $pgJun = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-06-01" and Vencimento < "2019-06-31"', [$unidade]);
        $pgJul = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-07-01" and Vencimento < "2019-07-31"', [$unidade]);
        $pgAgo = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-08-01" and Vencimento < "2019-08-31"', [$unidade]);
        $pgSet = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-09-01" and Vencimento < "2019-09-31"', [$unidade]);
        $pgOut = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-10-01" and Vencimento < "2019-10-31"', [$unidade]);
        $pgNov = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-11-01" and Vencimento < "2019-11-31"', [$unidade]);
        $pgDez = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > "2019-12-01" and Vencimento < "2019-12-31"', [$unidade]);

        $somaJan = 0;
        foreach ($pgJan as $pgto) {
            $somaJan = $somaJan + $pgto->Valor;
        }
        $somaFev = 0;
        foreach ($pgFev as $pgto) {
            $somaFev = $somaFev + $pgto->Valor;
        }
        $somaMar = 0;
        foreach ($pgMar as $pgto) {
            $somaMar = $somaMar + $pgto->Valor;
        }
        $somaAbr = 0;
        foreach ($pgAbr as $pgto) {
            $somaAbr = $somaAbr + $pgto->Valor;
        }
        $somaMai = 0;
        foreach ($pgMai as $pgto) {
            $somaMai = $somaMai + $pgto->Valor;
        }
        $somaJun = 0;
        foreach ($pgJun as $pgto) {
            $somaJun = $somaJun + $pgto->Valor;
        }
        $somaJul = 0;
        foreach ($pgJul as $pgto) {
            $somaJul = $somaJul + $pgto->Valor;
        }
        $somaAgo = 0;
        foreach ($pgAgo as $pgto) {
            $somaAgo = $somaAgo + $pgto->Valor;
        }
        $somaSet = 0;
        foreach ($pgSet as $pgto) {
            $somaSet = $somaSet + $pgto->Valor;
        }
        $somaOut = 0;
        foreach ($pgOut as $pgto) {
            $somaOut = $somaOut + $pgto->Valor;
        }
        $somaNov = 0;
        foreach ($pgNov as $pgto) {
            $somaNov = $somaNov + $pgto->Valor;
        }
        $somaDez = 0;
        foreach ($pgDez as $pgto) {
            $somaDez = $somaDez + $pgto->Valor;
        }

        $pdf = PDF::loadView('pdf.previsaoRecebimentos', ['somaJan' => $somaJan, 'somaFev' => $somaFev, 'somaMar' => $somaMar, 'somaAbr' => $somaAbr, 'somaJun' => $somaJun, 'somaJul' => $somaJul, 'somaAgo' => $somaAgo, 'somaSet' => $somaSet, 'somaOut' => $somaOut, 'somaMai' => $somaMai, 'somaNov' => $somaNov, 'somaDez' => $somaDez]);
        return $pdf->stream('invoice.pdf');
    }

    public function gerarRecibo($pag, $id)
    {
        $idUnidade = UnidadeController::getUnidade();
        $aluno = DB::table('aluno')->get()->where('id', $id)->first();
        $recibo = DB::table('pagamentos')->get()->where('numeroDocumento', $pag)->first();
        $unidade = DB::table('unidade')->get()->where('id', $idUnidade)->first();
        $parcelas = DB::table('formas_pagamento')->where('idCurso', $aluno->idCurso)->get('QtdeParcelas')->first();

        $recibo->Valor = number_format($recibo->Valor, 2, '.', '.');
        $valorExtenso = $this->convert_number_to_words($recibo->Valor);
        $recibo->Valor = number_format($recibo->Valor, 2, ',', '.');

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y H:i:s');
        $dia = date('d');
        $mes = date('m');
        switch ($mes) {
            case 1:
                $mes = 'Janeiro';
                break;
            case 2:
                $mes = 'Fevereiro';
                break;
            case 3:
                $mes = 'Março';
                break;
            case 4:
                $mes = 'Abril';
                break;
            case 5:
                $mes = 'Maio';
                break;
            case 6:
                $mes = 'Junho';
                break;
            case 7:
                $mes = 'Julho';
                break;
            case 8:
                $mes = 'Agosto';
                break;
            case 9:
                $mes = 'Setembro';
                break;
            case 10:
                $mes = 'Outubro';
                break;
            case 11:
                $mes = 'Novembro';
                break;
            case 12:
                $mes = 'Dezembro';
                break;
        }
        $ano = date('Y');
        $dateExtenso = "$dia de $mes de $ano";

        $pdf = PDF::loadView('pdf.recibo', ['unidade' => $unidade, 'aluno' => $aluno, 'date' => $date, 'dateExtenso' => $dateExtenso, 'recibo' => $recibo, 'valorExtenso' => $valorExtenso, 'qtdeParcelas' => $parcelas]);
        return $pdf->stream('invoice.pdf');
    }

    //Serviço para converter um número para uma string por extenso
    protected function convert_number_to_words($number)
    {

        $hyphen      = '-';
        $conjunction = ' e ';
        $separator   = ', ';
        $negative    = 'menos ';
        $decimal     = ' reais e ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'um',
            2                   => 'dois',
            3                   => 'três',
            4                   => 'quatro',
            5                   => 'cinco',
            6                   => 'seis',
            7                   => 'sete',
            8                   => 'oito',
            9                   => 'nove',
            10                  => 'dez',
            11                  => 'onze',
            12                  => 'doze',
            13                  => 'treze',
            14                  => 'quatorze',
            15                  => 'quinze',
            16                  => 'dezesseis',
            17                  => 'dezessete',
            18                  => 'dezoito',
            19                  => 'dezenove',
            20                  => 'vinte',
            30                  => 'trinta',
            40                  => 'quarenta',
            50                  => 'cinquenta',
            60                  => 'sessenta',
            70                  => 'setenta',
            80                  => 'oitenta',
            90                  => 'noventa',
            100                 => 'cento',
            200                 => 'duzentos',
            300                 => 'trezentos',
            400                 => 'quatrocentos',
            500                 => 'quinhentos',
            600                 => 'seiscentos',
            700                 => 'setecentos',
            800                 => 'oitocentos',
            900                 => 'novecentos',
            1000                => 'mil',
            1000000             => array('milhão', 'milhões'),
            1000000000          => array('bilhão', 'bilhões'),
            1000000000000       => array('trilhão', 'trilhões'),
            1000000000000000    => array('quatrilhão', 'quatrilhões'),
            1000000000000000000 => array('quinquilhão', 'quinquilhões')
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $conjunction . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = floor($number / 100) * 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_number_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                if ($baseUnit == 1000) {
                    $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[1000];
                } elseif ($numBaseUnits == 1) {
                    $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][0];
                } else {
                    $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][1];
                }
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            // $string .= ' reais ';
            // $words = array();
            // var_dump($fraction);
            // echo convert_number_to_words($fraction);
            // foreach (str_split((string) $fraction) as $number) {
            //     $words[] = convert_number_to_words($number);;
            // }
            // var_dump($words);

            // $string .= implode(' ', $words)." centavos";
            $string .= $this->convert_decimal_to_words($fraction) . " centavos";
        } else {
            $string .= ' reais';
        }

        return $string;
    }
    function convert_decimal_to_words($number)
    {

        $hyphen      = '-';
        $conjunction = ' e ';
        $separator   = ', ';
        $negative    = 'menos ';
        $decimal     = ' reais e ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'um',
            2                   => 'dois',
            3                   => 'três',
            4                   => 'quatro',
            5                   => 'cinco',
            6                   => 'seis',
            7                   => 'sete',
            8                   => 'oito',
            9                   => 'nove',
            10                  => 'dez',
            11                  => 'onze',
            12                  => 'doze',
            13                  => 'treze',
            14                  => 'quatorze',
            15                  => 'quinze',
            16                  => 'dezesseis',
            17                  => 'dezessete',
            18                  => 'dezoito',
            19                  => 'dezenove',
            20                  => 'vinte',
            30                  => 'trinta',
            40                  => 'quarenta',
            50                  => 'cinquenta',
            60                  => 'sessenta',
            70                  => 'setenta',
            80                  => 'oitenta',
            90                  => 'noventa',
            100                 => 'cento',
            200                 => 'duzentos',
            300                 => 'trezentos',
            400                 => 'quatrocentos',
            500                 => 'quinhentos',
            600                 => 'seiscentos',
            700                 => 'setecentos',
            800                 => 'oitocentos',
            900                 => 'novecentos',
            1000                => 'mil',
            1000000             => array('milhão', 'milhões'),
            1000000000          => array('bilhão', 'bilhões'),
            1000000000000       => array('trilhão', 'trilhões'),
            1000000000000000    => array('quatrilhão', 'quatrilhões'),
            1000000000000000000 => array('quinquilhão', 'quinquilhões')
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_decimal_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . $this->convert_decimal_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $conjunction . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = floor($number / 100) * 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds];
                if ($remainder) {
                    $string .= $conjunction . $this->convert_decimal_to_words($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                if ($baseUnit == 1000) {
                    $string = $this->convert_decimal_to_words($numBaseUnits) . ' ' . $dictionary[1000];
                } elseif ($numBaseUnits == 1) {
                    $string = $this->convert_decimal_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][0];
                } else {
                    $string = $this->convert_decimal_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][1];
                }
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= $this->convert_decimal_to_words($remainder);
                }
                break;
        }

        return $string;
    }
}
