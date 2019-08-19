<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
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
        dd($pag);
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
        // $input = $request->all();
        // $pagamentos = $this->pagamentosRepository->create($input);
        // Flash::success('Pagamentos saved successfully.');
        // return redirect(route('pagamentos.index'));
        $input = $request->all();

        $aluno = $this->alunoRepository->find($input->Matricula);
        $formaPgtos = $this->formaPgtoRepository->all();
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $input->Matricula)->where('Parcela', $input->Parcela);

        return view('pagamentos.edit', ['aluno' => $aluno, 'formaPgtos' => $formaPgtos]);
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
        $pagamentos = $this->pagamentosRepository->find($id);

        if (empty($pagamentos)) {
            Flash::error('Pagamentos not found');

            return redirect(route('pagamentos.index'));
        }

        return view('pagamentos.show')->with('pagamentos', $pagamentos);
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
