<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAjudaRequest;
use App\Http\Requests\UpdateAjudaRequest;
use App\Repositories\AjudaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AjudaController extends AppBaseController
{
    /** @var  AjudaRepository */
    private $ajudaRepository;

    public function __construct(AjudaRepository $ajudaRepo)
    {
        $this->ajudaRepository = $ajudaRepo;
    }

    /**
     * Display a listing of the Ajuda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('ajudas.index');
        $ajudas = $this->ajudaRepository->all();

        return view('ajudas.index')
            ->with('ajudas', $ajudas);
    }

    /**
     * Show the form for creating a new Ajuda.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('ajudas.update');
        return view('ajudas.create');
    }

    /**
     * Store a newly created Ajuda in storage.
     *
     * @param CreateAjudaRequest $request
     *
     * @return Response
     */
    public function store(CreateAjudaRequest $request)
    {
        PermissionController::temPermissao('ajudas.update');
        $input = $request->all();

        $ajuda = $this->ajudaRepository->create($input);

        Flash::success('Ticket criado com sucesso.');

        return redirect(route('ajudas.index'));
    }

    /**
     * Display the specified Ajuda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            Flash::error('Ticket não encontrado.');

            return redirect(route('ajudas.index'));
        }

        return view('ajudas.show')->with('ajuda', $ajuda);
    }

    /**
     * Show the form for editing the specified Ajuda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('ajudas.edit');
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            Flash::error('Ticket não encontrado.');

            return redirect(route('ajudas.index'));
        }

        return view('ajudas.edit')->with('ajuda', $ajuda);
    }

    /**
     * Update the specified Ajuda in storage.
     *
     * @param int $id
     * @param UpdateAjudaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAjudaRequest $request)
    {
        PermissionController::temPermissao('ajudas.edit');
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            Flash::error('Ticket não encontrado.');

            return redirect(route('ajudas.index'));
        }

        $ajuda = $this->ajudaRepository->update($request->all(), $id);

        Flash::success('Ticket atualizado com sucesso.');

        return redirect(route('ajudas.index'));
    }

    /**
     * Remove the specified Ajuda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('ajudas.delete');
        $ajuda = $this->ajudaRepository->find($id);

        if (empty($ajuda)) {
            Flash::error('Ticket não encontrado.');

            return redirect(route('ajudas.index'));
        }

        $this->ajudaRepository->delete($id);

        Flash::success('Ticket deletado com sucesso.');

        return redirect(route('ajudas.index'));
    }
}
