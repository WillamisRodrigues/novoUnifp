<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\CreateCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use App\Repositories\CursoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Flash;
use Response;

class CursoController extends AppBaseController
{
    /** @var  CursoRepository */
    private $cursoRepository;

    public function __construct(CursoRepository $cursoRepo)
    {
        $this->cursoRepository = $cursoRepo;
    }

    /**
     * Display a listing of the Curso.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $unidade = UnidadeController::getUnidade();
        $cursos = DB::table('curso')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        return view('cursos.index')->with('cursos', $cursos);
    }

    public function provas($id)
    {
        $curso = DB::table('curso')->get()->where('id', $id)->first();
        return view('cursos.avaliacoes', ['curso' => $curso]);
    }

    public function addProva($id)
    {
        return view('cursos.addProva', ['id' => $id]);
    }

    /**
     * Show the form for creating a new Curso.
     *
     * @return Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created Curso in storage.
     *
     * @param CreateCursoRequest $request
     *
     * @return Response
     */
    public function store(CreateCursoRequest $request)
    {
        $input = $request->all();

        $curso = $this->cursoRepository->create($input);

        $unidade = UnidadeController::getUnidade();
        DB::table('curso')->where('id', $curso->id)->update(['idUnidade' => $unidade]);

        Flash::success('Curso criado com sucesso.');

        return redirect(route('cursos.index'));
    }

    /**
     * Store a newly created Curso in storage.
     *
     * @param CreateCursoRequest $request
     *
     * @return Response
     */
    public function storeProva(Request $request)
    {
        $input = $request->all();
        $extensao = $request->file('caminhoProva')->extension();

        if ($extensao != 'pdf') {
            Flash::error('O arquivo não é do tipo PDF.');

            return redirect()->action('CursoController@addProva', ['id' => $request->id]);

        } else {

            $caminho = Storage::disk('public')->putFile('provas', $request->file('caminhoProva'));
            DB::update('update curso set nomeProva = ?, caminhoProva = ? where id = ?', [$request->nomeProva, $caminho, $request->id]);
            $curso = DB::table('curso')->get()->where('id', $request->id)->first();

            Flash::success('Prova adicionada com sucesso.');

            return redirect()->action('CursoController@provas', ['id' => $request->id, 'curso' => $curso]);
        }
    }

    /**
     * Display the specified Curso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            Flash::error('Curso não encontrado.');

            return redirect(route('cursos.index'));
        }

        return view('cursos.show')->with('curso', $curso);
    }

    /**
     * Show the form for editing the specified Curso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            Flash::error('Curso não encontrado.');

            return redirect(route('cursos.index'));
        }

        return view('cursos.edit')->with('curso', $curso);
    }

    /**
     * Update the specified Curso in storage.
     *
     * @param int $id
     * @param UpdateCursoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursoRequest $request)
    {
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            Flash::error('Curso não encontrado.');

            return redirect(route('cursos.index'));
        }

        $curso = $this->cursoRepository->update($request->all(), $id);

        Flash::success('Curso atualizado com sucesso.');

        return redirect(route('cursos.index'));
    }

    /**
     * Remove the specified Curso from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $curso = $this->cursoRepository->find($id);

        if (empty($curso)) {
            Flash::error('Curso não encontrado.');

            return redirect(route('cursos.index'));
        }

        $this->cursoRepository->delete($id);

        Flash::success('Curso deletado com sucesso.');

        return redirect(route('cursos.index'));
    }

    public function avaliacoes()
    {
        // $cursos = DB::table('curso')->get()->where('id', $id);
        // return view('cursos.avaliacoes', ['cursos' => $cursos]);
        return view('cursos.avaliacoes');
    }
}
