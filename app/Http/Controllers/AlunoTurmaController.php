<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Http\Requests\CreateFrequenciaRequest;
use App\Repositories\AlunoRepository;
use App\Repositories\FuncionarioRepository;
use App\Repositories\FrequenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\EscolaridadeRepository;
use App\Repositories\CursoRepository;
use App\Repositories\TurmaRepository;
use App\Repositories\ComoConheceuRepository;
use App\Models\FormasPagamento;
use App\Repositories\FormasPagamentoRepository;
use App\Http\Controllers\PagtoController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Arr;

class AlunoTurmaController extends Controller
{
    /** @var  AlunoRepository */
    private $alunoRepository;

    public function __construct(AlunoRepository $alunoRepo, FuncionarioRepository $funcionarioRepo, EscolaridadeRepository $escolaridadeRepo, CursoRepository $cursoRepo, TurmaRepository $turmaRepo, FormasPagamentoRepository $formasPagamentoRepository, ComoConheceuRepository $comoConheceuRepo, FrequenciaRepository $frequenciaRepo, PagtoController $pagamento)
    {
        $this->alunoRepository = $alunoRepo;
        $this->funcionarioRepository = $funcionarioRepo;
        $this->escolaridadeRepository = $escolaridadeRepo;
        $this->cursoRepository = $cursoRepo;
        $this->turmaRepository = $turmaRepo;
        $this->pagRepository = $formasPagamentoRepository;
        $this->comoConheceuRepository = $comoConheceuRepo;
        $this->pagamento = $pagamento;
        $this->frequenciaRepository = $frequenciaRepo;
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
        // $alunos = DB::table('aluno')->where('idTurma', $id)->get();

        $unidade = UnidadeController::getUnidade();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade],['idTurma', '=', $id],['deleted_at', '=', null]])->get();

        return view('alunos.index', ['alunos' => $alunos]);
    }
}
