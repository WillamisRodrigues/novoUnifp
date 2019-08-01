<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCentroCustoRequest;
use App\Http\Requests\UpdateCentroCustoRequest;
use App\Repositories\CentroCustoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CentroCustoController extends AppBaseController
{
    /** @var  CentroCustoRepository */
    private $centroCustoRepository;

    public function __construct(CentroCustoRepository $centroCustoRepo)
    {
        $this->centroCustoRepository = $centroCustoRepo;
    }

    /**
     * Display a listing of the CentroCusto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $centroCustos = $this->centroCustoRepository->all();

        return view('centro_custos.index')
            ->with('centroCustos', $centroCustos);
    }

    /**
     * Show the form for creating a new CentroCusto.
     *
     * @return Response
     */
    public function create()
    {
        return view('centro_custos.create');
    }

    /**
     * Store a newly created CentroCusto in storage.
     *
     * @param CreateCentroCustoRequest $request
     *
     * @return Response
     */
    public function store(CreateCentroCustoRequest $request)
    {
        $input = $request->all();

        $centroCusto = $this->centroCustoRepository->create($input);

        Flash::success('Centro de Custo criado com sucesso.');

        return redirect(route('centroCustos.index'));
    }

    /**
     * Display the specified CentroCusto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error('Centro de Custo não encontrado.');

            return redirect(route('centroCustos.index'));
        }

        return view('centro_custos.show')->with('centroCusto', $centroCusto);
    }

    /**
     * Show the form for editing the specified CentroCusto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error('Centro de Custo não encontrado.');

            return redirect(route('centroCustos.index'));
        }

        return view('centro_custos.edit')->with('centroCusto', $centroCusto);
    }

    /**
     * Update the specified CentroCusto in storage.
     *
     * @param int $id
     * @param UpdateCentroCustoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCentroCustoRequest $request)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error('Centro de Custo não encontrado.');

            return redirect(route('centroCustos.index'));
        }

        $centroCusto = $this->centroCustoRepository->update($request->all(), $id);

        Flash::success('Centro de Custo atualizado com sucesso.');

        return redirect(route('centroCustos.index'));
    }

    /**
     * Remove the specified CentroCusto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $centroCusto = $this->centroCustoRepository->find($id);

        if (empty($centroCusto)) {
            Flash::error('Centro de Custo não encontrado.');

            return redirect(route('centroCustos.index'));
        }

        $this->centroCustoRepository->delete($id);

        Flash::success('Centro de Custo deletado com sucesso.');

        return redirect(route('centroCustos.index'));
    }
}
