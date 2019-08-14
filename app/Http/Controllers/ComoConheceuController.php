<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComoConheceuRequest;
use App\Http\Requests\UpdateComoConheceuRequest;
use App\Repositories\ComoConheceuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ComoConheceuController extends AppBaseController
{
    /** @var  ComoConheceuRepository */
    private $comoConheceuRepository;

    public function __construct(ComoConheceuRepository $comoConheceuRepo)
    {
        $this->comoConheceuRepository = $comoConheceuRepo;
    }

    /**
     * Display a listing of the ComoConheceu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comoConheceus = $this->comoConheceuRepository->all();

        return view('como_conheceus.index')
            ->with('comoConheceus', $comoConheceus);
    }

    /**
     * Show the form for creating a new ComoConheceu.
     *
     * @return Response
     */
    public function create()
    {
        return view('como_conheceus.create');
    }

    /**
     * Store a newly created ComoConheceu in storage.
     *
     * @param CreateComoConheceuRequest $request
     *
     * @return Response
     */
    public function store(CreateComoConheceuRequest $request)
    {
        $input = $request->all();

        $comoConheceu = $this->comoConheceuRepository->create($input);

        Flash::success('Nova forma de conhecimento adicionada com sucesso.');

        return redirect(route('comoConheceus.index'));
    }

    /**
     * Display the specified ComoConheceu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comoConheceu = $this->comoConheceuRepository->find($id);

        if (empty($comoConheceu)) {
            Flash::error('Forma de conhecimento não encontrada.');

            return redirect(route('comoConheceus.index'));
        }

        return view('como_conheceus.show')->with('comoConheceu', $comoConheceu);
    }

    /**
     * Show the form for editing the specified ComoConheceu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comoConheceu = $this->comoConheceuRepository->find($id);

        if (empty($comoConheceu)) {
            Flash::error('Forma de conhecimento não encontrada.');

            return redirect(route('comoConheceus.index'));
        }

        return view('como_conheceus.edit')->with('comoConheceu', $comoConheceu);
    }

    /**
     * Update the specified ComoConheceu in storage.
     *
     * @param int $id
     * @param UpdateComoConheceuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComoConheceuRequest $request)
    {
        $comoConheceu = $this->comoConheceuRepository->find($id);

        if (empty($comoConheceu)) {
            Flash::error('Forma de conhecimento não encontrada.');

            return redirect(route('comoConheceus.index'));
        }

        $comoConheceu = $this->comoConheceuRepository->update($request->all(), $id);

        Flash::success('Forma de conhecimento atualizada com sucesso.');

        return redirect(route('comoConheceus.index'));
    }

    /**
     * Remove the specified ComoConheceu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comoConheceu = $this->comoConheceuRepository->find($id);

        if (empty($comoConheceu)) {
            Flash::error('Forma de conhecimento não encontrada.');

            return redirect(route('comoConheceus.index'));
        }

        $this->comoConheceuRepository->delete($id);

        Flash::success('Forma de conhecimento deletada com sucesso.');

        return redirect(route('comoConheceus.index'));
    }
}
