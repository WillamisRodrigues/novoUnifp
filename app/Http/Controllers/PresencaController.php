<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Repositories\AlunoRepository;
use App\Repositories\CursoRepository;
use App\Repositories\TurmaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class PresencaController extends AppBaseController
{
    /** @var  AlunoRepository */
    private $alunoRepository;

    public function __construct(AlunoRepository $alunoRepo, CursoRepository $cursoRepo, TurmaRepository $turmaRepo)
    {
        $this->alunoRepository = $alunoRepo;
        $this->cursoRepository = $cursoRepo;
        $this->turmaRepository = $turmaRepo;
    }

    /**
     * Display a listing of the Aluno.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('controles.index');
        $unidade = UnidadeController::getUnidade();
        $frequencia = DB::table('frequencia')->where('idUnidade', $unidade)->get();
        // dd($frequencia);
        $alunos = DB::table('aluno')->where('idUnidade', $unidade)->get();
        $cursos = $this->cursoRepository->all()->where('idUnidade', $unidade);
        $turmas = $this->turmaRepository->all()->where('Status', 'Ativa');

        return view('controles.presenca', ['cursos' => $cursos, 'alunos' => $alunos, 'turmas' => $turmas, 'unidade' => $unidade, 'frequencias' => $frequencia]);
    }

    public function filtrar(Request $request)
    {
        PermissionController::temPermissao('controles.index');
        $unidade = UnidadeController::getUnidade();
        $frequencia = DB::table('frequencia')->where([['idUnidade', '=', $unidade], ['idTurma', '=', $request->turmas]])->get();
        $alunos = DB::table('aluno')->where('idUnidade', $unidade)->get();
        $cursos = $this->cursoRepository->all()->where('idUnidade', $unidade);
        $turmas = $this->turmaRepository->all()->where('Status', 'Ativa');

        return view('controles.presenca', ['cursos' => $cursos, 'alunos' => $alunos, 'turmas' => $turmas, 'unidade' => $unidade, 'frequencias' => $frequencia]);
    }

    /**
     * Show the form for creating a new Aluno.
     *
     * @return Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created Aluno in storage.
     *
     * @param CreateAlunoRequest $request
     *
     * @return Response
     */
    public function store(CreateAlunoRequest $request)
    {
        $input = $request->all();

        $aluno = $this->alunoRepository->create($input);

        Flash::success('Aluno criado com sucesso.');

        return redirect(route('alunos.index'));
    }

    /**
     * Display the specified Aluno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }

        return view('alunos.show')->with('aluno', $aluno);
    }

    /**
     * Show the form for editing the specified Aluno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unidade = UnidadeController::getUnidade();
        $frequencia = DB::table('frequencia')->where([['idFrequencia', '=', $id], ['deleted_at', '=', null]])->get()->first();
        $aluno = DB::table('aluno')->where([['id', '=', $frequencia->idAluno], ['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get()->first();

        if (empty($frequencia)) {
            Flash::error('frequencia não encontrado.');

            return redirect(route('frequencias.index'));
        }

        return view('controles.edit', ['frequencia' => $frequencia, 'aluno'  => $aluno]);
    }

    /**
     * Update the specified Aluno in storage.
     *
     * @param int $id
     * @param UpdateAlunoRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        DB::update('update frequencia set Frequencia = ? where idFrequencia = ?', [$request->Frequencia, $request->idFrequencia]);

        return redirect(route('presenca.index'));
    }

    /**
     * Remove the specified Aluno from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }

        $this->alunoRepository->delete($id);

        Flash::success('Aluno deletado com sucesso.');

        return redirect(route('alunos.index'));
    }
}
