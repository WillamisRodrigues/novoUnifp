<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use App\Repositories\TurmaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\CursoRepository;

class TurmaController extends AppBaseController
{
    /** @var  TurmaRepository */
    private $turmaRepository;

    public function __construct(TurmaRepository $turmaRepo, CursoRepository $cursoRepo)
    {
        $this->turmaRepository = $turmaRepo;
        $this->cursoRepository = $cursoRepo;
    }

    /**
     * Display a listing of the Turma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $turmas = $this->turmaRepository->all()->where('Status', 'Ativa');
        return view('turmas.index')
            ->with('turmas', $turmas);
    }

    /**
     * Show the form for creating a new Turma.
     *
     * @return Response
     */
    public function create()
    {
        $cursos = $this->cursoRepository->all();

        return view('turmas.create')->with('cursos', $cursos);
    }

    /**
     * Store a newly created Turma in storage.
     *
     * @param CreateTurmaRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmaRequest $request)
    {
        $input = $request->all();

        $turma = $this->turmaRepository->create($input);

        Flash::success('Turma criada com sucesso.');

        return redirect(route('turmas.index'));
    }

    /**
     * Display the specified Turma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turma = $this->turmaRepository->find($id);

        if (empty($turma)) {
            Flash::error('Turma não encontrada.');

            return redirect(route('turmas.index'));
        }

        return view('turmas.show')->with('turma', $turma);
    }

    /**
     * Show the form for editing the specified Turma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $turma = $this->turmaRepository->find($id);

        if (empty($turma)) {
            Flash::error('Turma não encontrada.');

            return redirect(route('turmas.index'));
        }

        return view('turmas.edit')->with('turma', $turma);
    }

    /**
     * Update the specified Turma in storage.
     *
     * @param int $id
     * @param UpdateTurmaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmaRequest $request)
    {
        $turma = $this->turmaRepository->find($id);

        if (empty($turma)) {
            Flash::error('Turma não encontrada.');

            return redirect(route('turmas.index'));
        }

        $turma = $this->turmaRepository->update($request->all(), $id);

        Flash::success('Turma atualizada com sucesso.');

        return redirect(route('turmas.index'));
    }

    /**
     * Remove the specified Turma from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $turma = $this->turmaRepository->find($id);

        if (empty($turma)) {
            Flash::error('Turma não encontrada.');

            return redirect(route('turmas.index'));
        }

        $this->turmaRepository->delete($id);

        Flash::success('Turma deletada com sucesso.');

        return redirect(route('turmas.index'));
    }
}
