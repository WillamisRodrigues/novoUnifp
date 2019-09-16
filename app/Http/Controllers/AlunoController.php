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


class AlunoController extends AppBaseController
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
     * Display a listing of the Aluno.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $unidade = UnidadeController::getUnidade();
        $alunos = DB::table('aluno')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        return view('alunos.index')->with('alunos', $alunos);
    }

    /**
     * Show the form for creating a new Aluno.
     *
     * @return Response
     */
    public function create()
    {
        $unidade = UnidadeController::getUnidade();

        $funcionarios = DB::table('funcionario')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Cargo', '=','Vendedor']])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        $escolaridades = $this->escolaridadeRepository->all();
        $pagamentos = $this->pagRepository->all();
        $comoConheceu = $this->comoConheceuRepository->all();
        $vencimento = DB::table('dias_vencimento')->where('idUnidade', $unidade)->get();


        return view('alunos.create', ['funcionarios' => $funcionarios, 'escolaridades' => $escolaridades, 'cursos' => $cursos, 'turmas' => $turmas, 'pagamentos' => $pagamentos, 'conheceu' => $comoConheceu, 'vencimentos' => $vencimento, 'unidade' => $unidade]);
    }

    /**
     * Store a newly created Aluno in storage.
     *
     * @param CreateAlunoRequest $request
     *
     * @return Response
     */
    public function store(CreateAlunoRequest $requestAluno)
    {
        $inputAluno = $requestAluno->all();
        $aluno = $this->alunoRepository->create($inputAluno);

        $unidade = UnidadeController::getUnidade();
        DB::table('aluno')->where('id', $aluno->id)->update(['idUnidade' => $unidade]);

        $matricula = Arr::get($aluno, 'id');
        $idParcelamento = Arr::get($inputAluno, 'idCurso');
        $parcelamentos = DB::table('formas_pagamento')->get()->where('idCurso', $idParcelamento);

        $contrato = DB::table('contratos')->get()->where('id', $aluno->idCurso)->first();

        foreach ($parcelamentos as $parcelamento) {
            $valor = $parcelamento->ParcelaBruta;
            $qtdeParcelas = $parcelamento->QtdeParcelas;
        }

        $valorMatricula = $contrato->Matricula;

        date_default_timezone_set('America/Sao_Paulo');
        $timestamp = date("Y-m-d H:i:s");

        $dia = Arr::get($inputAluno, 'Vencimento');
        $mes = date("m");
        $ano = date("Y");
        $hoje = date("Y-m-d");

        //logica para gerar os registros de pagamentos no sistema quando um aluno for adicionado
        for ($_i = 1; $_i <= $qtdeParcelas; $_i++) {

            //logica para "montar" a datade vencimento
            if($mes < 10 && $mes != date("Y-m")){
                $dataVencimento = "$ano-0$mes-$dia";
            } else {
                $dataVencimento = "$ano-$mes-$dia";
            }

            if ($_i == 1) {
                DB::table('pagamentos')->insert(
                    [
                        'Parcela' => $_i,
                        'Matricula' => $matricula,
                        'Referencia' => 'Matricula',
                        'Status' => 'Aberto',
                        'Valor' => $valorMatricula,
                        'Vencimento' => $hoje,
                        'created_at' => $timestamp,
                        'idUnidade' => $unidade,
                        'updated_at' => $timestamp
                    ]
                );
            } else {
                DB::table('pagamentos')->insert(
                    [
                        'Parcela' => $_i,
                        'Matricula' => $matricula,
                        'Referencia' => 'Mensalidade',
                        'Status' => 'Aberto',
                        'Valor' => $valor,
                        'Vencimento' => $dataVencimento,
                        'created_at' => $timestamp,
                        'idUnidade' => $unidade,
                        'updated_at' => $timestamp
                    ]
                );
            }

            //lógica para virar o ano quando o mes exceder 12
            if($mes >= 12){
                $mes = 1;
                $ano++;
            } else {
                $mes++;
            }
        }

        //cria a frequencia - falta setar o idAula
        DB::table('frequencia')->insert(
            [
                'idAluno' => $aluno->id,
                'idTurma' => $aluno->Turma,
                'Frequencia' => 0,
                'idAula' => 0,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ]
        );

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

        $turma = DB::table('turma')->where('id', $aluno->idTurma)->get()->first();
        $curso = DB::table('curso')->where('id', $aluno->idCurso)->get()->first();
        $pagamento = DB::table('formas_pagamento')->where('idCurso', $curso->id)->get()->first();

        return view('alunos.show', ['aluno' => $aluno, 'turma' => $turma, 'curso' => $curso, 'pagamento' => $pagamento]);
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
        $aluno = $this->alunoRepository->find($id);
        $escolaridades = $this->escolaridadeRepository->all();
        $funcionarios = DB::table('funcionario')->where([['Cargo', '=', 'Vendedor'], ['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $turmas = DB::table('turma')->where([['idUnidade', '=', $unidade], ['Status', '=', 'Ativa'], ['idCurso', '=', $aluno->idTurma], ['deleted_at', '=', null]])->get();
        $vencimento = DB::table('dias_vencimento')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();
        $pagamentos = $this->pagRepository->all();
        $comoConheceu = $this->comoConheceuRepository->all();

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }

        return view('alunos.edit', ['aluno' => $aluno, 'funcionarios' => $funcionarios, 'escolaridades' => $escolaridades, 'cursos' => $cursos, 'turmas' => $turmas, 'pagamentos' => $pagamentos, 'conheceu' => $comoConheceu, 'vencimentos' => $vencimento]);
    }

    /**
     * Update the specified Aluno in storage.
     *
     * @param int $id
     * @param UpdateAlunoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlunoRequest $request)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }

        $aluno = $this->alunoRepository->update($request->all(), $id);

        Flash::success('Aluno atualizado com sucesso.');

        return redirect(route('alunos.index'));
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
