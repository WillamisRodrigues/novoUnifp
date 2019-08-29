<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Http\Requests\CreatePagamentosRequest;
use Illuminate\Support\Arr;
use App\Repositories\AlunoRepository;
use App\Repositories\PagtoRepository;
use App\Repositories\PagamentosRepository;
use App\Repositories\FormaPgtoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Flash;
use Response;

class PagamentosController extends AppBaseController
{
    /** @var  PagamentosRepository */
    private $pagamentosRepository;

    public function __construct(PagamentosRepository $pagamentosRepo, AlunoRepository $alunoRepo, FormaPgtoRepository $formaPgtoRepo, PagtoRepository $pagtoRepo)
    {
        $this->pagamentosRepository = $pagamentosRepo;
        $this->alunoRepository = $alunoRepo;
        $this->formaPgtoRepository = $formaPgtoRepo;
        $this->pagtoRepository = $pagtoRepo;
    }

    /**
     * Display a listing of the Pagamentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($id)
    {
        $alunos = $this->alunoRepository->all()->where('id', $id);
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $id);

        return view('pagamentos.index', ['alunos' => $alunos, 'pagtos' => $pagtos]);
    }

    public function lancamento($pag, $matricula)
    {
        $aluno = DB::table('aluno')->get()->where('id', $matricula)->first();
        $recibo = DB::table('pagamentos')->get()->where('numeroDocumento', $pag)->first();
        $formaPgtos = DB::table('forma_pgto')->get();

        return view('pagamentos.edit', ['aluno' => $aluno, 'recibo' => $recibo, 'formaPgtos' => $formaPgtos]);
    }

    /**
     * Show the form for creating a new Pagamentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('pagamentos.create');
    }

    /**
     * Store a newly created Pagamentos in storage.
     *
     * @param CreatePagamentosRequest $request
     *
     * @return Response
     */
    public function store(CreatePagamentosRequest $request)
    {
        $input = $request->all();

        Arr::set($input, 'Multa', str_replace(',', '.', Arr::get($input, 'Multa')));
        Arr::set($input, 'Valor', str_replace(',', '.', Arr::get($input, 'Valor')));

        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i:s');

        if ($input['Multa'] != null) {
            DB::update('update pagamentos set Status = ?, Forma = ?, Multa = ?, Usuario = ?, Data = ?, Valor = ?, DataPgto = ? where numeroDocumento = ?', [$input['Status'], $input['FormaPagamento'], $input['Multa'], $input['Usuario'], $date, $input['Valor'], $date, $input['numeroDocumento']]);
        } else {
            DB::update('update pagamentos set Status = ?, Forma = ?, Usuario = ?, Data = ?, Valor = ?, DataPgto = ? where numeroDocumento = ?', [$input['Status'], $input['FormaPagamento'], $input['Usuario'], $date, $input['Valor'], $date, $input['numeroDocumento']]);
        }

        $parcela = $input['Valor'];

        if($input["Multa"] != null){
            $parcela += $input["Multa"];
        }
        $aluno = DB::table('aluno')->get()->where('id', $input['Matricula'])->first();

        $recibo = DB::table('pagamentos')->get()->where('numeroDocumento', $input['numeroDocumento'])->first();

        DB::insert('insert into caixa (Tipo,Via,FormaPgto,Status,Aluno,Descricao,Lancamento,Vencimento,Valor,CentroCusto,ContaCaixa,Usuario,Data) values (?,?,?,?,?,?,?,?,?,?,?,?,?)', ['Pagamento','Caixa',$input['FormaPagamento'],'Pago',$aluno->Nome,'Pagamento de Parcela',$date,$recibo->Vencimento,$parcela,'Centro de Custo',$input['Usuario'],$input['Usuario'],$date ]);

        $aluno = DB::table('aluno')->get()->where('id', $input['Matricula']);
        $recibo = DB::table('pagamentos')->get()->where('Matricula', $input['Matricula']);
        $formaPgtos = DB::table('forma_pgto')->get();

        return redirect()->action('PagamentoController@show', ['id' => $input['Matricula'],'alunos' => $aluno, 'pagtos' => $recibo, 'formaPgtos' => $formaPgtos]);

    }

    /**
     * Display the specified Pagamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pagamentos = DB::table('pagamentos')->get()->where('Matricula', $id);
        $aluno = DB::table('aluno')->get()->where('id', $id);

        if (empty($pagamentos)) {
            Flash::error('Pagamentos not found');

            return redirect(route('alunos.index'));
        }

        return view('pagamentos.index', ['pagtos' => $pagamentos, 'alunos' => $aluno]);
    }

    /**
     * Show the form for editing the specified Pagamentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pagamentos = $this->pagamentosRepository->find($id);

        if (empty($pagamentos)) {
            Flash::error('Pagamentos not found');

            return redirect(route('pagamentos.index'));
        }

        return view('pagamentos.edit')->with('pagamentos', $pagamentos);
    }

    /**
     * Update the specified Pagamentos in storage.
     *
     * @param int $id
     * @param UpdatePagamentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagamentosRequest $request)
    {
        $pagamentos = $this->pagamentosRepository->find($id);

        if (empty($pagamentos)) {
            Flash::error('Pagamentos not found');

            return redirect(route('pagamentos.index'));
        }

        $pagamentos = $this->pagamentosRepository->update($request->all(), $id);

        Flash::success('Pagamentos updated successfully.');

        return redirect(route('pagamentos.index'));
    }

    /**
     * Remove the specified Pagamentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pagamentos = $this->pagamentosRepository->find($id);

        if (empty($pagamentos)) {
            Flash::error('Pagamentos not found');

            return redirect(route('pagamentos.index'));
        }

        $this->pagamentosRepository->delete($id);

        Flash::success('Pagamentos deleted successfully.');

        return redirect(route('pagamentos.index'));
    }
}
