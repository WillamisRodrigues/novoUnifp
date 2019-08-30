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

class TurmaInativaController extends AppBaseController
{
    /** @var  TurmaRepository */
    private $turmaRepository;

    public function __construct(TurmaRepository $turmaRepo)
    {
        $this->turmaRepository = $turmaRepo;
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
        // $turmas = $this->turmaRepository->all()->where('Status', 'Inativa');

        $unidade = UnidadeController::getUnidade();
        $turmas = DB::table('turma')->where([['Status', '=', 'Inativa'], ['deleted_at', '=', null],['idUnidade', '=', $unidade]])->get();
        $cursos = DB::table('curso')->get();
        $professores = DB::table('funcionario')->where([['Cargo', '=', 'Professor'],['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        return view('turmasInativas.index', ['turmas' => $turmas, 'cursos' => $cursos, 'professores' => $professores]);
    }
}
