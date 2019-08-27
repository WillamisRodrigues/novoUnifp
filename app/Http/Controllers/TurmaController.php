<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRequest;
use Illuminate\Support\Facades\DB;
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
        $cursos = DB::table('curso')->get();
        return view('turmas.index', ['turmas' => $turmas, 'cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new Turma.
     *
     * @return Response
     */
    public function create()
    {
        $cursos = $this->cursoRepository->all();
        $professores = DB::table('funcionario')->get()->where('Cargo', 'Professor');
        $cronogramas = DB::table('cronograma')->get();
        $horarios = DB::table('horario')->get();

        return view('turmas.create', ['cursos' => $cursos, 'professores' => $professores, 'cronogramas' => $cronogramas, 'horarios' => $horarios]);
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

        $horarios = DB::table('horario')->get()->where('id', $turma->Horario)->first();
        $curso = DB::table('curso')->get()->where('id', $turma->idCurso )->first();
        // dd($curso);

        return view('turmas.show', ['turma' => $turma, 'horario' => $horarios, 'curso' => $curso]);
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

        $cursos = DB::table('curso')->get();
        $professores = DB::table('funcionario')->get()->where('Cargo', 'Professor');
        $cronogramas = DB::table('cronograma')->get();
        $horarios = DB::table('horario')->get();

        // return view('turmas.edit')->with('turma', $turma);

        return view('turmas.edit', ['cursos' => $cursos, 'professores' => $professores, 'cronogramas' => $cronogramas, 'turma'=> $turma, 'horarios' => $horarios]);
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
