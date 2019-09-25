<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePagtoRequest;
use App\Http\Requests\UpdatePagtoRequest;
use App\Repositories\PagtoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PagtoController extends AppBaseController
{
    /** @var  PagtoRepository */
    private $pagtoRepository;

    public function __construct(PagtoRepository $pagtoRepo)
    {
        $this->pagtoRepository = $pagtoRepo;
    }

    /**
     * Display a listing of the Pagto.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('pagamentos.index');
        $pagtos = $this->pagtoRepository->all();

        return view('pagtos.index')
            ->with('pagtos', $pagtos);
    }

    /**
     * Show the form for creating a new Pagto.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('pagamentos.update');
        return view('pagtos.create');
    }

    /**
     * Store a newly created Pagto in storage.
     *
     * @param CreatePagtoRequest $request
     *
     * @return Response
     */
    public function store(CreatePagtoRequest $request)
    {
        PermissionController::temPermissao('pagamentos.update');
        $input = $request->all();

        $pagto = $this->pagtoRepository->create($input);

        Flash::success('Pagto saved successfully.');

        return redirect(route('pagtos.index'));
    }

    /**
     * Display the specified Pagto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('pagamentos.index');
        $pagto = $this->pagtoRepository->find($id);

        if (empty($pagto)) {
            Flash::error('Pagto not found');

            return redirect(route('pagtos.index'));
        }

        return view('pagtos.show')->with('pagto', $pagto);
    }

    /**
     * Show the form for editing the specified Pagto.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('pagamentos.edit');
        $pagto = $this->pagtoRepository->find($id);

        if (empty($pagto)) {
            Flash::error('Pagto not found');

            return redirect(route('pagtos.index'));
        }

        return view('pagtos.edit')->with('pagto', $pagto);
    }

    /**
     * Update the specified Pagto in storage.
     *
     * @param int $id
     * @param UpdatePagtoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagtoRequest $request)
    {
        PermissionController::temPermissao('pagamentos.edit');
        $pagto = $this->pagtoRepository->find($id);

        if (empty($pagto)) {
            Flash::error('Pagto not found');

            return redirect(route('pagtos.index'));
        }

        $pagto = $this->pagtoRepository->update($request->all(), $id);

        Flash::success('Pagto updated successfully.');

        return redirect(route('pagtos.index'));
    }

    /**
     * Remove the specified Pagto from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('pagamentos.delete');
        $pagto = $this->pagtoRepository->find($id);

        if (empty($pagto)) {
            Flash::error('Pagto not found');

            return redirect(route('pagtos.index'));
        }

        $this->pagtoRepository->delete($id);

        Flash::success('Pagto deleted successfully.');

        return redirect(route('pagtos.index'));
    }
}
