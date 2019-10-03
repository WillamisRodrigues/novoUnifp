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
        PermissionController::temPermissao('lancamentos.index');
        // $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        $unidade = UnidadeController::getUnidade();
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $centroCusto = DB::table('centro_custo')->get();

        $dia01 = date('Y-m-01 00:00:00');
        $dia30 = date('Y-m-31 23:59:59');

        $caixaMesReceitas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Receita'], ['Lancamento', '>=', $dia01], ['Lancamento', '<=', $dia30]])->get();
        $caixaMesDespesas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Despesa'], ['Lancamento', '>=', $dia01], ['Lancamento', '<=', $dia30]])->get();

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
        PermissionController::temPermissao('lancamentos.index');
        $unidade = UnidadeController::getUnidade();
        $formas = DB::table('forma_pgto')->get();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $contaCaixa = DB::table('funcionario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $centroCusto = DB::table('centro_custo')->get();


        return view('lancamentos.avancado', ['formas' => $formas, 'alunos' => $alunos, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto]);
    }

    public function buscaAvancada(Request $request)
    {
        PermissionController::temPermissao('lancamentos.index');
        $unidade = UnidadeController::getUnidade();
        // $dados = DB::select('select * from caixa where deleted_at = null & Tipo = :tipo & Via = :via & FormaPgto = :forma & Status = :status & Aluno = :aluno & Lancamento >= :lancamentoinicio & Lancamento <= :lancamentofim & Vencimento >= :vencimentoinicio & Vencimento <= :vencimentofim & Valor = :valor & idUnidade = :unidade', [1]);
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();


        return view('lancamentos.index', ['caixas' => $caixas]);
    }

    public function filtroLancamentos(Request $request)
    {
        PermissionController::temPermissao('lancamentos.index');
        $unidade = UnidadeController::getUnidade();

        if($request->Mes){
            $dia01 = "-".$request->Mes."-01 ".date('00:00:00');
            $dia30 = "-".$request->Mes."-31 ".date('23:59:59');
        } else {
            $dia01 = date('m-01 00:00:00');
            $dia30 = date('m-31 23:59:59');
        }

        if($request->Ano){
            $dia01 = $request->Ano.$dia01;
            $dia30 = $request->Ano.$dia30;
            $lancamento_inicio = ['Lancamento', '>=', $dia01];
            $lancamento_fim = ['Lancamento', '<=', $dia30];
        } else {
            $dia01 = date('Y').$dia01;
            $dia30 = date('Y').$dia30;
            $lancamento_inicio = ['Lancamento', '>=', $dia01];
            $lancamento_fim = ['Lancamento', '<=', $dia30];
        }

        if(!$request->Mes && !$request->Ano){
            $hoje = date('Y-m-d 23:59:59');
            $lancamento_inicio = ['Lancamento', '>=', "2015-01-01"];
            $lancamento_fim = ['Lancamento', '<=', $hoje];
        }

        if($request->Tipo){
            $tipo = ['Tipo', '=', $request->Tipo];
        } else {
            $tipo = ['Tipo', '<>', null];
        }

        if($request->Usuario){
            $usuario = ['Usuario', '=', $request->Usuario];
        } else {
            $usuario = ['Usuario', '<>', null];
        }

        if($request->CentroCusto){
            $centro_de_custo = ['CentroCusto', '=', $request->CentroCusto];
        } else {
            $centro_de_custo = ['CentroCusto', '<>', null];
        }

        // $dados = DB::select('select * from caixa where deleted_at = null & Tipo = :tipo & Via = :via & FormaPgto = :forma & Status = :status & Aluno = :aluno & Lancamento >= :lancamentoinicio & Lancamento <= :lancamentofim & Vencimento >= :vencimentoinicio & Vencimento <= :vencimentofim & Valor = :valor & idUnidade = :unidade', [1]);
        $caixaMesReceitas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '<>', 'Despesa'], $lancamento_inicio, $lancamento_fim, $centro_de_custo, $usuario])->get();
        $caixaMesDespesas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], ['Tipo', '=', 'Despesa'], $lancamento_inicio, $lancamento_fim, $centro_de_custo, $usuario])->get();

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
        $caixas = DB::table('caixa')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null], $tipo, $lancamento_inicio, $lancamento_fim, $centro_de_custo, $usuario])->orderBy('Lancamento', 'desc')->get();


        return view('lancamentos.index', ['caixas' => $caixas, 'contaCaixa' => $contaCaixa, 'centroCusto' => $centroCusto, 'receitasMes' => $receitasMes, 'depesasMes' => $despesasMes, 'saldoAtual' => $saldoAtual, 'saldoMes' => $saldoMes]);
    }

    /**
     * Show the form for creating a new Caixa.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('lancamentos.update');
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
        PermissionController::temPermissao('lancamentos.update');
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
        PermissionController::temPermissao('lancamentos.index');
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
        PermissionController::temPermissao('lancamentos.edit');
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
        PermissionController::temPermissao('lancamentos.edit');
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
        PermissionController::temPermissao('lancamentos.delete');
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
