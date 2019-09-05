<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateTurmaRequest;
use App\Repositories\TurmaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        // $turmas = $this->turmaRepository->all()->where('Status', 'Ativa');
        $unidade = UnidadeController::getUnidade();
        $turmas = DB::table('turma')->where([['Status', '=', 'Ativa'], ['deleted_at', '=', null],['idUnidade', '=', $unidade]])->get();
        $cursos = DB::table('curso')->get();
        $professores = DB::table('funcionario')->where([['Cargo', '=', 'Professor'],['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        return view('turmas.index', ['turmas' => $turmas, 'cursos' => $cursos, 'professores' => $professores]);
    }

    /**
     * Show the form for creating a new Turma.
     *
     * @return Response
     */
    public function create()
    {
        $unidade = UnidadeController::getUnidade();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $professores = DB::table('funcionario')->where([['Cargo', '=', 'Professor'], ['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $cronogramas = DB::table('cronograma')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $horarios = DB::table('horario')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

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

        $unidade = UnidadeController::getUnidade();
        DB::table('turma')->where('id', $turma->id)->update(['idUnidade' => $unidade]);

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
        $unidade = UnidadeController::getUnidade();
        $horarios = DB::table('horario')->get()->where('id', $turma->Horario)->first();
        $curso = DB::table('curso')->get()->where('id', $turma->idCurso)->first();
        $professor = DB::table('funcionario')->where('id', $turma->Professor)->get()->first();


        return view('turmas.show', ['turma' => $turma, 'horario' => $horarios, 'curso' => $curso, 'professor' => $professor]);
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

        $unidade = UnidadeController::getUnidade();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        $professores = DB::table('funcionario')->get()->where('Cargo', 'Professor');
        $cronogramas = DB::table('cronograma')->get();
        $horarios = DB::table('horario')->get();



        // return view('turmas.edit')->with('turma', $turma);

        return view('turmas.edit', ['cursos' => $cursos, 'professores' => $professores, 'cronogramas' => $cronogramas, 'turma' => $turma, 'horarios' => $horarios]);
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
