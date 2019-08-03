<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCaixaRequest;
use App\Http\Requests\UpdateCaixaRequest;
use App\Repositories\CaixaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
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
        $caixas = $this->caixaRepository->all();

        return view('lancamentos.index')
            ->with('caixas', $caixas);
    }

    /**
     * Show the form for creating a new Caixa.
     *
     * @return Response
     */
    public function create()
    {
        return view('lancamentos.create');
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

        return view('lancamentos.edit')->with('caixa', $caixa);
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
