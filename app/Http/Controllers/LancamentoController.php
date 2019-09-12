<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateCaixaRequest;
use App\Http\Requests\UpdateCaixaRequest;
use App\Repositories\CaixaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Flash;
use Response;

class LancamentoController extends AppBaseController
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
        // $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $centroCusto = DB::table('centro_custo')->get();

        $caixaMesReceitas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
        $caixaMesDespesas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Sangria']])->get();

        $receitasMes = 0;
        $despesasMes = 0;
        $saldoAnterior = 0;

        foreach ($caixaMesDespesas as $item) {
            $despesasMes += $item->Valor;
        }
        foreach ($caixaMesReceitas as $item) {
            $receitasMes += $item->Valor;
        }

        $saldoAtual = $receitasMes - $despesasMes;
        $saldoMes = $receitasMes - $despesasMes;

        return view('lancamentos.index', ['caixas' => $caixas, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto, 'receitasMes' => $receitasMes, 'depesasMes' => $despesasMes, 'saldoAtual' => $saldoAtual, 'saldoMes' => $saldoMes]);
    }

    public function avancado()
    {
        $unidade = UnidadeController::getUnidade();
        $formas = DB::table('forma_pgto')->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $centroCusto = DB::table('centro_custo')->get();


        return view('lancamentos.avancado', ['formas' => $formas, 'alunos' => $alunos, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function buscaAvancada(Request $request)
    {

        $unidade = UnidadeController::getUnidade();
        // $dados = DB::select('select * from caixa where deleted_at = null & Tipo = :tipo & Via = :via & FormaPgto = :forma & Status = :status & Aluno = :aluno & Lancamento >= :lancamentoinicio & Lancamento <= :lancamentofim & Vencimento >= :vencimentoinicio & Vencimento <= :vencimentofim & Valor = :valor & idUnidade = :unidade', [1]);
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();


        return view('lancamentos.index', ['caixas' => $caixas]);
    }

    public function filtroLancamentos(Request $request)
    {

        $unidade = UnidadeController::getUnidade();
        // $dados = DB::select('select * from caixa where deleted_at = null & Tipo = :tipo & Via = :via & FormaPgto = :forma & Status = :status & Aluno = :aluno & Lancamento >= :lancamentoinicio & Lancamento <= :lancamentofim & Vencimento >= :vencimentoinicio & Vencimento <= :vencimentofim & Valor = :valor & idUnidade = :unidade', [1]);
        $caixaMesReceitas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita']])->get();
        $caixaMesDespesas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Sangria']])->get();

        $receitasMes = 0;
        $despesasMes = 0;
        $saldoAnterior = 0;

        foreach ($caixaMesDespesas as $item) {
            $despesasMes += $item->Valor;
        }
        foreach ($caixaMesReceitas as $item) {
            $receitasMes += $item->Valor;
        }

        $saldoAtual = $receitasMes - $despesasMes;
        $saldoMes = $receitasMes - $despesasMes;
        $centroCusto = DB::table('centro_custo')->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();


        return view('lancamentos.index', ['caixas' => $caixas, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto, 'receitasMes' => $receitasMes, 'depesasMes' => $despesasMes, 'saldoAtual' => $saldoAtual, 'saldoMes' => $saldoMes]);
    }

    /**
     * Show the form for creating a new Caixa.
     *
     * @return Response
     */
    public function create()
    {
        $formaPgto = DB::table('forma_pgto')->get();
        $centroCusto = DB::table('centro_custo')->get();
        $unidade = UnidadeController::getUnidade();
        $alunos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get();

        return view('lancamentos.create', ['formapgtos' => $formaPgto, 'centroCustos' => $centroCusto, 'alunos' => $alunos]);
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

        Arr::set($input, 'Valor', str_replace(',', '.', Arr::get($input, 'Valor')));

        $caixa = $this->caixaRepository->create($input);

        $unidade = UnidadeController::getUnidade();
        DB::update('update caixa set idUnidade =? where id = ?', [$unidade, $caixa->id]);

        Flash::success('Lançamento criado com sucesso.');

        return redirect(route('lancamentos.index'));
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
            Flash::error('Lançamento não encontrado.');

            return redirect(route('lancamentos.index'));
        }

        return view('lancamentos.show')->with('caixa', $caixa);
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
            Flash::error('Lançamento não encontrado.');

            return redirect(route('lancamentos.index'));
        }

        // return view('lancamentos.edit')->with('caixa', $caixa);
        $formaPgto = DB::table('forma_pgto')->get();
        $centroCusto = DB::table('centro_custo')->get();
        $unidade = UnidadeController::getUnidade();
        $alunos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get();

        return view('lancamentos.edit', ['formapgtos' => $formaPgto, 'centroCustos' => $centroCusto, 'caixa' => $caixa, 'alunos' => $alunos]);
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
            Flash::error('Lançamento não encontrado.');

            return redirect(route('lancamentos.index'));
        }

        $caixa = $this->caixaRepository->update($request->all(), $id);

        Flash::success('Lançamento atualizado com sucesso.');

        return redirect(route('lancamentos.index'));
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
            Flash::error('Lançamento não encontrado.');

            return redirect(route('lancamentos.index'));
        }

        $this->caixaRepository->delete($id);

        Flash::success('Lançamento deletado com sucesso.');

        return redirect(route('lancamentos.index'));
    }
}
