<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRequest;
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
        $turmas = $this->turmaRepository->all()->where('Status', 'Inativa');
        return view('turmasInativas.index')
            ->with('turmas', $turmas);
    }
}
