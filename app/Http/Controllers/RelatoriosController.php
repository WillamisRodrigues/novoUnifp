<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCaixaRequest;
use App\Http\Requests\UpdateCaixaRequest;
use App\Repositories\CaixaRepository;
use App\Http\Controllers\AppBaseController;
use DateTime;
use Illuminate\Support\Facades\DB;
use Flash;
use Illuminate\Support\Arr;
use Response;


class RelatoriosController extends Controller
{
    /** @var  CaixaRepository */
    private $caixaRepository;

    public function __construct(CaixaRepository $caixaRepo)
    {
        $this->caixaRepository = $caixaRepo;
    }

    /**
     * Display a listing of the Caixa.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        // $sum = 'Total: R$' . $sum;

        $centroCusto = DB::table('centro_custo')->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.receitas', ['caixas' => $caixas, 'sum' => $sum, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function despesas(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Despesa']])->get();
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        $sum = 'Total: R$' . $sum;

        return view('relatorios.despesas', ['caixas' => $caixas, 'sum' => $sum]);
    }

    public function filtroDespesas(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $dataInicio = "$request->ano-$request->mes-01 00:00:00";
        $dataFim = "$request->ano-$request->mes-31 23:59:59";

        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita'], ['created_at', '>=', $dataInicio], ['created_at', '<=', $dataFim]])->get();

        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        // $sum = 'Total: R$' . $sum;

        $centroCusto = DB::table('centro_custo')->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.receitas', ['caixas' => $caixas, 'sum' => $sum, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function alunosAtrasados()
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $alunosAtrasados = DB::table('pagamentos')->where([['DataPgto', '=', null], ['idUnidade', '=', $unidade], ['Vencimento', '<', $hoje], ['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.alunosAtrasados', ['alunos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos]);
    }

    public function filtroAlunosAtrasados(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $pagamentosAtrasados = DB::table('pagamentos');
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']]);
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]]);

        $matriculas[0] = 0;
        $i = 0;

        if ($request->Status) {
            $alunos = $alunos->where('Status', '=', $request->Status);
        }

        if ($request->Periodo) {
            $turmas = $turmas->where('Periodo', '=', $request->Periodo);
            $listaTurmas[0] = 0;
            $j = 0;
            foreach ($turmas->get() as $item) {
                $listaTurmas[$j] = $item->id;
                $j++;
            }
            if ($j != 0) {
                $j--;
            }
            while ($j >= 0) {
                $alunos = $alunos->where('idTurma', '=', $listaTurmas[$j]);
                $j--;
            }
        }

        foreach ($alunos->get() as $aluno) {
            $matriculas[$i] = $aluno->id;
            $i++;
        }

        if ($i != 0) {
            $i--;
        }

        while ($i >= 0) {
            $pagamentosAtrasados = $pagamentosAtrasados->orWhereRaw('DataPgto is null and Vencimento < ? and Matricula = ?', [$hoje, $matriculas[$i]]);
            $i--;
        }

        if ($request->VencimentoInicial) {
            $pagamentosAtrasados = $pagamentosAtrasados->where('Vencimento', '>=', $request->VencimentoInicial);
        }
        if ($request->VencimentoFinal) {
            $pagamentosAtrasados = $pagamentosAtrasados->where('Vencimento', '<=', $request->VencimentoFinal);
        }

        $alunos = $alunos->get();
        $turmas = $turmas->get();
        $pagamentosAtrasados = $pagamentosAtrasados->get();

        return view('relatorios.alunosAtrasados', ['alunos' => $pagamentosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos]);
    }

    public function geralAlunos()
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<', $hoje], ['deleted_at', '=', null]])->paginate(10);
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.geralAlunos', ['pagamentos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos, 'hoje' => $hoje]);
    }

    public function filtroGeralAlunos(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]]);
        $turmas = DB::table('turma')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Status', '=', 'Ativa']]);

        if ($request->Sexo) {
            $alunos = $alunos->where('Sexo', '=', $request->Sexo);
        }
        if ($request->Status) {
            $alunos = $alunos->where('Status', '=', $request->Status);
        }
        if ($request->Periodo) {
            $turmas = $turmas->where('Periodo', '=', $request->Periodo);
            $listaTurmas[0] = 0;
            $j = 0;
            foreach ($turmas->get() as $item) {
                $listaTurmas[$j] = $item->id;
                $j++;
            }
            $alunos = $alunos->whereIn('idTurma', $listaTurmas);
        }
        if ($request->Pagamentos) {
            $dia = date('d');
            $mes = date('m');
            $ano = date('Y');
            $hoje = date('Y-m-d');

            if ($request->Pagamentos == "Atrasado") {
                $listaAlunosPagamento[0] = 0;
                $i = 0;
                //selecionar todos os registros de mensalidade do mes atual que não possuem datapgto
                foreach ($alunos->get() as $aluno) {
                    if ($dia >= 1 && $dia <= $aluno->Vencimento) {
                        $mesPg = $mes - 1;
                        $mesPg = str_pad($mesPg, 2, '0', STR_PAD_LEFT);
                    } else if ($aluno->Vencimento < $dia && $dia <= 31) {
                        $mesPg = $mes;
                    }

                    if ($mes == 1) {
                        $anoPg = $ano - 1;
                        $mesPg = 12;
                    } else {
                        $anoPg = $ano;
                    }
                    $diaVenc = str_pad($aluno->Vencimento, 2, '0', STR_PAD_LEFT);
                    $diaPg = "$anoPg-$mesPg-$diaVenc";
                    $matricula = DB::table('pagamentos')->where([['Referencia', '=', 'Matricula'], ['Matricula', '=', $aluno->id]])->get()->first();

                    if ($matricula->DataPgto) {
                        $pagamentos = DB::select('select * from pagamentos where Vencimento = ? and Matricula = ?;', [$diaPg, $aluno->id]);
                        if ($pagamentos) {
                            if (!$pagamentos->DataPgto) {
                                $listaAlunosPagamento[$i] = $aluno->id;
                                $i++;
                            }
                        }
                    } else {
                        $listaAlunosPagamento[$i] = $aluno->id;
                        $i++;
                    }
                }
            }
            if ($request->Pagamentos == "Em dia") {
                $listaAlunosPagamento[0] = 0;
                $i = 0;
                //selecionar todos os registros de mensalidade do mes atual que possuem datapgto
                foreach ($alunos->get() as $aluno) {
                    if ($dia >= 1 && $dia <= $aluno->Vencimento) {
                        $mesPg = $mes - 1;
                        $mesPg = str_pad($mesPg, 2, '0', STR_PAD_LEFT);
                    } else if ($aluno->Vencimento < $dia && $dia <= 31) {
                        $mesPg = $mes;
                    }

                    if ($mes == 1) {
                        $anoPg = $ano - 1;
                        $mesPg = 12;
                    } else {
                        $anoPg = $ano;
                    }
                    $diaVenc = str_pad($aluno->Vencimento, 2, '0', STR_PAD_LEFT);
                    $diaPg = "$anoPg-$mesPg-$diaVenc";
                    $pagamentos = DB::select('select * from pagamentos where Vencimento = ? and Matricula = ?;', [$diaPg, $aluno->id]);
                    $matricula = DB::table('pagamentos')->where([['Referencia', '=', 'Matricula'], ['Matricula', '=', $aluno->id]])->get()->first();

                    if($matricula){
                    if ($matricula->DataPgto) {
                        if ($pagamentos) {
                            if ($pagamentos->DataPgto) {
                                $listaAlunosPagamento[$i] = $aluno->id;
                                $i++;
                            }
                        } else {
                            $listaAlunosPagamento[$i] = $aluno->id;
                            $i++;
                        }
                    }
                    }
                }
            }
            $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['deleted_at', '=', null]])->get();
            $alunos = $alunos->whereIn('id', $listaAlunosPagamento);
        } else {
            $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['deleted_at', '=', null]])->get();
        }
        $turmas = $turmas->get();
        $alunos = $alunos->get();

        return view('relatorios.geralAlunosResultados', ['pagamentos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos, 'hoje' => $hoje]);
    }

    public function atrasados()
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Status', '<>', 'Quitado']])->get()->last();
        return $pagamentos;
    }

    public function emDia()
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Status', '=', 'Quitado']])->get()->last();
        return $pagamentos;
    }

    public static function pagamentos($id)
    {
        PermissionController::temPermissao('relatorios.index');
        $hoje = date('Y-m-d');
        DB::update('update pagamentos set Status = "Vencido" where Vencimento < ? and DataPgto is null', [$hoje]);
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        $hoje = date('Y-m-d');
        $aluno = DB::table('aluno')->where('id', $id)->get()->first();
        $unidade = UnidadeController::getUnidade();

        if ($dia >= 1 && $dia <= $aluno->Vencimento) {
            $mesPg = $mes - 1;
            $mesPg = str_pad($mesPg, 2, '0', STR_PAD_LEFT);
        } else if ($aluno->Vencimento < $dia && $dia <= 31) {
            $mesPg = $mes;
        }

        if ($mes == 1) {
            $anoPg = $ano - 1;
            $mesPg = 12;
        } else {
            $anoPg = $ano;
        }

        $diaVenc = str_pad($aluno->Vencimento, 2, '0', STR_PAD_LEFT);
        $diaPg = "$anoPg-$mesPg-$diaVenc";
        $pagamentos = DB::select('select * from pagamentos where Vencimento = ? and Matricula = ?;', [$diaPg, $id]);
        $matricula = DB::table('pagamentos')->where([['Referencia', '=', 'Matricula'], ['Matricula', '=', $id]])->get()->first();

        if ($matricula) {
            if ($matricula->DataPgto) {
                if ($pagamentos) {
                    if ($pagamentos->DataPgto) {
                        $resultado = "<label class='bg-azul-redondo' style='padding: 2px 8px' for='Em dia'>Em dia</label>";
                    } else {
                        $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
                    }
                } else {
                    $resultado = "<label class='bg-azul-redondo' style='padding: 2px 8px' for='Em dia'>Em dia</label>";
                }
            }
                    else {
                        $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
                    }
        } else {
            $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
        }

        return $resultado;
    }

    public function geralRecebimentos()
    {
        PermissionController::temPermissao('relatorios.index');
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

        return view('relatorios.geralRecebimentos', [
            'somaQuitado' => $somaQuitado,
            'qtdeQuitado' => $qtdeQuitado,
            'somaAtrasado' => $somaAtrasado,
            'qtdeAtrasado' => $qtdeAtrasado,
            'somaAberto' => $somaAberto,
            'qtdeAberto' => $qtdeAberto,
        ]);
    }
    public function previsaoRecebimentos()
    {
        PermissionController::temPermissao('relatorios.index');
        $pagamentos = DB::table('pagamentos');
        $unidade = UnidadeController::getUnidade();
        $ano = date("Y");

        $janeiroInicio =    "$ano-01-01";
        $janeiroFim =       "$ano-01-31";
        $fevereiroInicio =  "$ano-02-01";
        $fevereiroFim =     "$ano-02-31";
        $marcoInicio =      "$ano-03-01";
        $marcoFim =         "$ano-03-31";
        $abrilInicio =      "$ano-04-01";
        $abrilFim =         "$ano-04-31";
        $maioInicio =       "$ano-05-01";
        $maioFim =          "$ano-05-31";
        $junhoInicio =      "$ano-06-01";
        $junhoFim =         "$ano-06-31";
        $julhoInicio =      "$ano-07-01";
        $julhoFim =         "$ano-07-31";
        $agostoInicio =     "$ano-08-01";
        $agostoFim =        "$ano-08-31";
        $setembroInicio =   "$ano-09-01";
        $setembroFim =      "$ano-09-31";
        $outubroInicio =    "$ano-10-01";
        $outubroFim =       "$ano-10-31";
        $novembroInicio =   "$ano-11-01";
        $novembroFim =      "$ano-11-31";
        $dezembroInicio =   "$ano-12-01";
        $dezembroFim =      "$ano-12-31";

        $pgJan = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $janeiroInicio, $janeiroFim]);
        $pgFev = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $fevereiroInicio, $fevereiroFim]);
        $pgMar = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $marcoInicio, $marcoFim]);
        $pgAbr = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $abrilInicio, $abrilFim]);
        $pgMai = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $maioInicio, $maioFim]);
        $pgJun = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $junhoInicio, $junhoFim]);
        $pgJul = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $julhoInicio, $julhoFim]);
        $pgAgo = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $agostoInicio, $agostoFim]);
        $pgSet = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $setembroInicio, $setembroFim]);
        $pgOut = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $outubroInicio, $outubroFim]);
        $pgNov = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $novembroInicio, $novembroFim]);
        $pgDez = DB::select('select Valor from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $dezembroInicio, $dezembroFim]);

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

        return view('relatorios.previsaoRecebimentos', ['somaJan' => $somaJan, 'somaFev' => $somaFev, 'somaMar' => $somaMar, 'somaAbr' => $somaAbr, 'somaJun' => $somaJun, 'somaJul' => $somaJul, 'somaAgo' => $somaAgo, 'somaSet' => $somaSet, 'somaOut' => $somaOut, 'somaMai' => $somaMai, 'somaNov' => $somaNov, 'somaDez' => $somaDez]);
    }

    public function filtroRecebimentos(Request $request)
    {
        PermissionController::temPermissao('relatorios.index');
        $unidade = UnidadeController::getUnidade();
        if ($request->Mes) {
            $dataInicio = "$request->Ano-$request->Mes-01";
            $dataFim = "$request->Ano-$request->Mes-31";
        } else {
            $dataInicio = "$request->Ano-01-01";
            $dataFim = "$request->Ano-12-31";
        }
        $pgMes = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['Vencimento', '>', $dataInicio], ['Vencimento', '<', $dataFim]])->get();
        $soma = 0;
        foreach ($pgMes as $pagto) {
            $soma = $soma + $pagto->Valor;
        }
        return view('relatorios.previsaoRecebimento', ['soma' => $soma, 'ano' => $request->Ano, 'mes' => $request->Mes]);
    }

    /**
     * Show the form for creating a new Caixa.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('relatorios.update');
        return view('caixas.create');
    }

    /**
     * Store a newly created Caixa in storage.
     *
     * @param CreateCaixaRequest $request
     *
     * @return Response
     */
    public function store(CreateCaixaRequest $request)
    {
        PermissionController::temPermissao('relatorios.update');
        $input = $request->all();

        $caixa = $this->caixaRepository->create($input);

        Flash::success('Caixa do Dia criado com sucesso.');

        return redirect(route('caixas.index'));
    }

    /**
     * Display the specified Caixa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('relatorios.index');
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            Flash::error('Caixa do Dia não encontrado.');

            return redirect(route('caixas.index'));
        }

        return view('caixas.show')->with('caixa', $caixa);
    }

    /**
     * Show the form for editing the specified Caixa.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('relatorios.edit');
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            Flash::error('Caixa do Dia não encontrado.');

            return redirect(route('caixas.index'));
        }

        return view('caixas.edit')->with('caixa', $caixa);
    }

    /**
     * Update the specified Caixa in storage.
     *
     * @param int $id
     * @param UpdateCaixaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCaixaRequest $request)
    {
        PermissionController::temPermissao('relatorios.edit');
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            Flash::error('Caixa do Dia não encontrado.');

            return redirect(route('caixas.index'));
        }

        $caixa = $this->caixaRepository->update($request->all(), $id);

        Flash::success('Caixa do Dia atualizado com sucesso.');

        return redirect(route('caixas.index'));
    }

    /**
     * Remove the specified Caixa from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('relatorios.delete');
        $caixa = $this->caixaRepository->find($id);

        if (empty($caixa)) {
            Flash::error('Caixa do Dia não encontrado.');

            return redirect(route('caixas.index'));
        }

        $this->caixaRepository->delete($id);

        Flash::success('Caixa do Dia deletado com sucesso.');

        return redirect(route('caixas.index'));
    }
}
