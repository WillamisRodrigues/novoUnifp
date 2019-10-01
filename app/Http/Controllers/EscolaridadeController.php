<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEscolaridadeRequest;
use App\Http\Requests\UpdateEscolaridadeRequest;
use App\Repositories\EscolaridadeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EscolaridadeController extends AppBaseController
{
    /** @var  EscolaridadeRepository */
    private $escolaridadeRepository;

    public function __construct(EscolaridadeRepository $escolaridadeRepo)
    {
        $this->escolaridadeRepository = $escolaridadeRepo;
    }

    /**
     * Display a listing of the Escolaridade.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('escolaridades.index');
        $unidade = UnidadeController::getUnidade();
        $escolaridades = $this->escolaridadeRepository->all();

        return view('escolaridades.index')
            ->with('escolaridades', $escolaridades);
    }

    /**
     * Show the form for creating a new Escolaridade.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('escolaridades.update');
        return view('escolaridades.create');
    }

    /**
     * Store a newly created Escolaridade in storage.
     *
     * @param CreateEscolaridadeRequest $request
     *
     * @return Response
     */
    public function store(CreateEscolaridadeRequest $request)
    {
        PermissionController::temPermissao('escolaridades.update');
        $input = $request->all();

        $escolaridade = $this->escolaridadeRepository->create($input);

        Flash::success('Escolaridade salva com sucesso.');

        return redirect(route('escolaridades.index'));
    }

    /**
     * Display the specified Escolaridade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('escolaridades.index');
        $escolaridade = $this->escolaridadeRepository->find($id);

        if (empty($escolaridade)) {
            Flash::error('Escolaridade não encontrada.');

            return redirect(route('escolaridades.index'));
        }

        return view('escolaridades.show')->with('escolaridade', $escolaridade);
    }

    /**
     * Show the form for editing the specified Escolaridade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('escolaridades.edit');
        $escolaridade = $this->escolaridadeRepository->find($id);

        if (empty($escolaridade)) {
            Flash::error('Escolaridade não encontrada.');

            return redirect(route('escolaridades.index'));
        }

        return view('escolaridades.edit')->with('escolaridade', $escolaridade);
    }

    /**
     * Update the specified Escolaridade in storage.
     *
     * @param int $id
     * @param UpdateEscolaridadeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEscolaridadeRequest $request)
    {
        PermissionController::temPermissao('escolaridades.edit');
        $escolaridade = $this->escolaridadeRepository->find($id);

        if (empty($escolaridade)) {
            Flash::error('Escolaridade não encontrada.');

            return redirect(route('escolaridades.index'));
        }

        $escolaridade = $this->escolaridadeRepository->update($request->all(), $id);

        Flash::success('Escolaridade editada com sucesso.');

        return redirect(route('escolaridades.index'));
    }

    /**
     * Remove the specified Escolaridade from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('escolaridades.delete');
        $escolaridade = $this->escolaridadeRepository->find($id);

        if (empty($escolaridade)) {
            Flash::error('Escolaridade não encontrada.');

            return redirect(route('escolaridades.index'));
        }

        $this->escolaridadeRepository->delete($id);

        Flash::success('Escolaridade deletada com sucesso.');

        return redirect(route('escolaridades.index'));
    }
}
