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
        $caixas = $this->caixaRepository->all()->where('Tipo', 'Receita');
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
            // echo $caixa->Valor;
        }
        $sum = 'Total: R$'.$sum.',00';

        return view('relatorios.receitas', ['caixas' => $caixas, 'sum' => $sum]);
        // return view('controles.presenca', ['cursos' => $cursos, 'alunos' => $alunos, 'turmas' => $turmas]);
    }
    public function despesas(Request $request)
    {
        $caixas = $this->caixaRepository->all()->where('Tipo', 'Receita');
        $sum = 0;

        foreach ($caixas as $caixa) {
            $sum += $caixa->Valor;
            // echo $caixa->Valor;
        }
        $sum = 'Total: R$'.$sum.',00';

        return view('relatorios.despesas', ['caixas' => $caixas, 'sum' => $sum]);
        // return view('controles.presenca', ['cursos' => $cursos, 'alunos' => $alunos, 'turmas' => $turmas]);
    }

    public function alunosAtrasados(){
        return view('relatorios.alunosAtrasados');
    }
    public function geralAlunos(){
        return view('relatorios.geralAlunos');
    }
    public function geralRecebimentos(){
        return view('relatorios.geralRecebimentos');
    }
    public function previsaoRecebimentos(){
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
