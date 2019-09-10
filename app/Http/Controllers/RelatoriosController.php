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
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        $sum = 'Total: R$' . $sum;

        $centroCusto = DB::table('centro_custo')->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.receitas', ['caixas' => $caixas, 'sum' => $sum, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function despesas(Request $request)
    {
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
        $dataInicio = "$request->ano-$request->mes-01 00:00:00";
        $dataFim = "$request->ano-$request->mes-31 23:59:59";

        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita'], ['created_at', '>=', $dataInicio], ['created_at', '<=', $dataFim]])->get();

        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        $sum = 'Total: R$' . $sum;

        $centroCusto = DB::table('centro_custo')->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.receitas', ['caixas' => $caixas, 'sum' => $sum, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function alunosAtrasados()
    {
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
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<', $hoje], ['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        return view('relatorios.geralAlunos', ['pagamentos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos, 'hoje' => $hoje]);
    }

    public function filtroGeralAlunos(Request $request)
    {

        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']]);
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]]);

        // dd($request->all());

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
            if ($j != 0) {
                $j--;
            }
            while ($j >= 0) {
                $alunos = $alunos->where('idTurma', '=', $listaTurmas[$j]);
                $j--;
            }
        }
        if ($request->Pagamentos) {
            if ($request->Pagamentos == "Atrasado") {
                $alunosAtrasados = $this->atrasados();
                // $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['deleted_at', '=', null], ['Status', '=', "Quitado"]])->get();
            }
            if ($request->Pagamentos == "Em dia") {
                $alunosAtrasados = $this->emDia();
                // $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['deleted_at', '=', null], ['Status', '<>', "Quitado"]])->get();
            }
        } else {
            $alunosAtrasados = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['deleted_at', '=', null]])->get();
        }

        $turmas = $turmas->get();
        $alunos = $alunos->get();

        // dd($alunosAtrasados);

        return view('relatorios.geralAlunos', ['pagamentos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos, 'hoje' => $hoje]);
    }

    public function atrasados()
    {
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Status', '<>', 'Quitado']])->get()->last();
        return $pagamentos;
    }

    public function emDia()
    {
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Status', '=', 'Quitado']])->get()->last();
        return $pagamentos;
    }

    public static function pagamentos($id)
    {
        $hoje = date('Y-m-d');
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos')->where([['Vencimento', '<=', $hoje], ['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";

        foreach ($pagamentos as $pagamento) {
            if ($pagamento->Matricula == $id) {
                if ($pagamento->DataPgto) {
                    $resultado = "<label class='bg-azul-redondo' style='padding: 2px 8px' for='Em dia'>Em dia</label>";
                } else {
                    $resultado = "<label class='bg-vermelho-redondo' style='padding: 2px 8px' for='Atrasado'>Atrasado</label>";
                }
            }
        }

        return $resultado;
    }

    public function geralRecebimentos()
    {
        return view('relatorios.geralRecebimentos');
    }
    public function previsaoRecebimentos()
    {
        $unidade = UnidadeController::getUnidade();
        $pagamentos = DB::table('pagamentos');
        // DB::select('posts.id','posts.title','posts.body')->from('posts')->where('posts.author_id', '=', 1)
        // DB::table('orders')->selectRaw('price * ? as price_with_tax', [1.0825])->get();
        $pgJan = DB::select('select Valor from pagamentos where Vencimento > "2019-01-01" and Vencimento < "2019-01-31"');
        $pgFev = DB::select('select Valor from pagamentos where Vencimento > "2019-02-01" and Vencimento < "2019-02-31"');
        $pgMar = DB::select('select Valor from pagamentos where Vencimento > "2019-03-01" and Vencimento < "2019-03-31"');
        $pgAbr = DB::select('select Valor from pagamentos where Vencimento > "2019-04-01" and Vencimento < "2019-04-31"');
        $pgMai = DB::select('select Valor from pagamentos where Vencimento > "2019-05-01" and Vencimento < "2019-05-31"');
        $pgJun = DB::select('select Valor from pagamentos where Vencimento > "2019-06-01" and Vencimento < "2019-06-31"');
        $pgJul = DB::select('select Valor from pagamentos where Vencimento > "2019-07-01" and Vencimento < "2019-07-31"');
        $pgAgo = DB::select('select Valor from pagamentos where Vencimento > "2019-08-01" and Vencimento < "2019-08-31"');
        $pgSet = DB::select('select Valor from pagamentos where Vencimento > "2019-09-01" and Vencimento < "2019-09-31"');
        $pgOut = DB::select('select Valor from pagamentos where Vencimento > "2019-10-01" and Vencimento < "2019-10-31"');
        $pgNov = DB::select('select Valor from pagamentos where Vencimento > "2019-11-01" and Vencimento < "2019-11-31"');
        $pgDez = DB::select('select Valor from pagamentos where Vencimento > "2019-12-01" and Vencimento < "2019-12-31"');

        // dd($pgDez);

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

        $somas = [$somaJan, $somaFev, $somaMar, $somaAbr, $somaMai, $somaJun, $somaJul, $somaAgo, $somaSet, $somaOut, $somaNov, $somaDez];

        // dd($somas);

        return view('relatorios.previsaoRecebimentos', ['somaJan' => $somaJan, 'somaFev' => $somaFev, 'somaMar' => $somaMar, 'somaAbr' => $somaAbr, 'somaJun' => $somaJun, 'somaJul' => $somaJul, 'somaAgo' => $somaAgo, 'somaSet' => $somaSet, 'somaOut' => $somaOut, 'somaMai' => $somaMai, 'somaNov' => $somaNov, 'somaDez' => $somaDez]);
    }

    public function filtroRecebimentos(Request $request)
    {
        $unidade = UnidadeController::getUnidade();
        $dataInicio = "$request->Ano-$request->Mes-01";
        $dataFim = "$request->Ano-$request->Mes-21";
        $pgMes = DB::table('pagamentos')->where([['idUnidade', '=', $unidade], ['Vencimento', '>', $dataInicio], ['Vencimento', '<', $dataFim]])->get();
        $soma = 0;
        foreach($pgMes as $pagto){
            $soma = $soma + $pagto->Valor;
        }
        // dd($soma);
        return view('relatorios.previsaoRecebimento', ['soma' => $soma, 'ano' => $request->Ano, 'mes' => $request->Mes]);
    }

    /**
     * Show the form for creating a new Caixa.
     *
     * @return Response
     */
    public function create()
    {
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
