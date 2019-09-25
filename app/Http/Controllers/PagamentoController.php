<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Http\Requests\CreatePagamentosRequest;
use App\Repositories\AlunoRepository;
use App\Repositories\PagtoRepository;
use App\Repositories\FormaPgtoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Flash;
use Response;

class PagamentoController extends AppBaseController
{
    /** @var  AlunoRepository */
    private $alunoRepository;

    public function __construct(AlunoRepository $alunoRepo, FormaPgtoRepository $formaPgtoRepo, PagtoRepository $pagtoRepo)
    {
        $this->alunoRepository = $alunoRepo;
        $this->formaPgtoRepository = $formaPgtoRepo;
        $this->pagtoRepository = $pagtoRepo;
    }

    /**
     * Display a listing of the Aluno.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($id)
    {
        PermissionController::temPermissao('pagamentos.index');
        $alunos = $this->alunoRepository->all()->where('id', $id);
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $id);

        return view('pagamentos.index', ['alunos' => $alunos, 'pagtos' => $pagtos]);
    }

    public function lancamento($pag, $matricula)
    {
        PermissionController::temPermissao('pagamentos.index');
        $aluno = DB::table('aluno')->get()->where('id', $matricula)->first();
        $recibo = DB::table('pagamentos')->get()->where('numeroDocumento', $pag)->first();
        $formaPgtos = DB::table('forma_pgto')->get();

        // dd($recibo);

        return view('pagamentos.edit', ['aluno' => $aluno, 'recibo' => $recibo, 'formaPgtos' => $formaPgtos]);
    }

    /**
     * Store a newly created Aluno in storage.
     *
     * @param CreateAlunoRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        PermissionController::temPermissao('pagamentos.update');
        $input = $request->all();

        $aluno = $this->alunoRepository->find($input->Matricula);
        $formaPgtos = $this->formaPgtoRepository->all();
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $input->Matricula)->where('Parcela', $input->Parcela);

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('pagamentos.index'));
        }

        return view('pagamentos.edit', ['aluno' => $aluno, 'formaPgtos' => $formaPgtos]);
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
        PermissionController::temPermissao('pagamentos.update');
        $alunos = $this->alunoRepository->all()->where('id', $id);
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $id);

        return view('pagamentos.index', ['alunos' => $alunos, 'pagtos' => $pagtos]);
    }

    /**
     * Show the form for editing the specified Aluno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($Matricula, $Parcela)
    {
        PermissionController::temPermissao('pagamentos.edit');
        $aluno = $this->alunoRepository->find($Matricula);
        $formaPgtos = $this->formaPgtoRepository->all();
        $pagtos = $this->pagtoRepository->all()->where('Matricula', $Matricula)->where('Parcela', $Parcela);

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('pagamentos.index'));
        }

        // return view('alunos.edit')->with('aluno', $aluno);
        // return view('pagamentos.edit', ['aluno' => $aluno, 'formaPgtos' => $formaPgtos]);
        return redirect()->action('PagamentoController@lancamento', ['id' => $Matricula, 'formaPgtos' => $formaPgtos]);

    }

    /**
     * Update the specified Aluno in storage.
     *
     * @param int $id
     * @param UpdateAlunoRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateAlunoRequest $request)
    public function notas($id)
    {
        PermissionController::temPermissao('pagamentos.index');
        $aluno = $this->alunoRepository->find($id)->first();

        if (empty($aluno)) {
            Flash::error('Aluno não encontrado.');

            return redirect(route('alunos.index'));
        }
        // dd($aluno);
        return view('relatorios.notas', ['aluno' => $aluno]);
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
        PermissionController::temPermissao('pagamentos.delete');
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
