<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenivelAcessoRequest;
use App\Http\Requests\UpdatenivelAcessoRequest;
use App\Repositories\nivelAcessoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class nivelAcessoController extends AppBaseController
{
    /** @var  nivelAcessoRepository */
    private $nivelAcessoRepository;

    public function __construct(nivelAcessoRepository $nivelAcessoRepo)
    {
        $this->nivelAcessoRepository = $nivelAcessoRepo;
    }

    /**
     * Display a listing of the nivelAcesso.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nivelAcessos = $this->nivelAcessoRepository->all();

        return view('nivel_acessos.index')
            ->with('nivelAcessos', $nivelAcessos);
    }

    /**
     * Show the form for creating a new nivelAcesso.
     *
     * @return Response
     */
    public function create()
    {
        return view('nivel_acessos.create');
    }

    /**
     * Store a newly created nivelAcesso in storage.
     *
     * @param CreatenivelAcessoRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelAcessoRequest $request)
    {
        $input = $request->all();

        $nivelAcesso = $this->nivelAcessoRepository->create($input);

        Flash::success('Nivel Acesso saved successfully.');

        return redirect(route('nivelAcessos.index'));
    }

    /**
     * Display the specified nivelAcesso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nivelAcesso = $this->nivelAcessoRepository->find($id);

        if (empty($nivelAcesso)) {
            Flash::error('Nivel Acesso not found');

            return redirect(route('nivelAcessos.index'));
        }

        return view('nivel_acessos.show')->with('nivelAcesso', $nivelAcesso);
    }

    /**
     * Show the form for editing the specified nivelAcesso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nivelAcesso = $this->nivelAcessoRepository->find($id);

        if (empty($nivelAcesso)) {
            Flash::error('Nivel Acesso not found');

            return redirect(route('nivelAcessos.index'));
        }

        return view('nivel_acessos.edit')->with('nivelAcesso', $nivelAcesso);
    }

    /**
     * Update the specified nivelAcesso in storage.
     *
     * @param int $id
     * @param UpdatenivelAcessoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelAcessoRequest $request)
    {
        $nivelAcesso = $this->nivelAcessoRepository->find($id);

        if (empty($nivelAcesso)) {
            Flash::error('Nivel Acesso not found');

            return redirect(route('nivelAcessos.index'));
        }

        $nivelAcesso = $this->nivelAcessoRepository->update($request->all(), $id);

        Flash::success('Nivel Acesso updated successfully.');

        return redirect(route('nivelAcessos.index'));
    }

    /**
     * Remove the specified nivelAcesso from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nivelAcesso = $this->nivelAcessoRepository->find($id);

        if (empty($nivelAcesso)) {
            Flash::error('Nivel Acesso not found');

            return redirect(route('nivelAcessos.index'));
        }

        $this->nivelAcessoRepository->delete($id);

        Flash::success('Nivel Acesso deleted successfully.');

        return redirect(route('nivelAcessos.index'));
    }
}
