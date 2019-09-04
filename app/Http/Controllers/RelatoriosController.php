<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCaixaRequest;
use App\Http\Requests\UpdateCaixaRequest;
use App\Repositories\CaixaRepository;
use App\Http\Controllers\AppBaseController;
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
        // $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
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
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Tipo', '=', 'Despesa']])->get();
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
        }
        $sum = 'Total: R$' . $sum ;

        return view('relatorios.despesas', ['caixas' => $caixas, 'sum' => $sum]);
    }

    public function filtroDespesas(Request $request)
    {
        $dataInicio = "$request->ano-$request->mes-01 00:00:00";
        $dataFim = "$request->ano-$request->mes-31 23:59:59";

        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Tipo', '=', 'Receita'],['created_at', '>=', $dataInicio], ['created_at', '<=', $dataFim]])->get();

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
        $alunosAtrasados = DB::table('pagamentos')->where([['DataPgto', '=', null], ['Vencimento', '<', $hoje], ['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        // dd($turmas);

        return view('relatorios.alunosAtrasados', ['alunos' => $alunosAtrasados, 'cursos' => $cursos, 'turmas' => $turmas, 'alunoGeral' => $alunos]);
    }
    public function geralAlunos()
    {
        return view('relatorios.geralAlunos');
    }
    public function geralRecebimentos()
    {
        return view('relatorios.geralRecebimentos');
    }
    public function previsaoRecebimentos()
    {
        return view('relatorios.previsaoRecebimentos');
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
