<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModuloRequest;
use App\Http\Requests\UpdateModuloRequest;
use App\Repositories\ModuloRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class ModuloController extends AppBaseController
{
    /** @var  ModuloRepository */
    private $moduloRepository;

    public function __construct(ModuloRepository $moduloRepo)
    {
        $this->moduloRepository = $moduloRepo;
    }

    /**
     * Display a listing of the Modulo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $modulos = $this->moduloRepository->all();

        return view('modulos.index')
            ->with('modulos', $modulos);
    }

    /**
     * Show the form for creating a new Modulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Store a newly created Modulo in storage.
     *
     * @param CreateModuloRequest $request
     *
     * @return Response
     */
    public function store(CreateModuloRequest $request)
    {
        $input = $request->all();

        $modulo = $this->moduloRepository->create($input);

        $unidade = UnidadeController::getUnidade();
        //DB::update('update modulos set idUnidade = ? where id = ?', [$unidade, $modulo->id]);

        Flash::success('Módulo adicionado com sucesso.');

        return redirect(route('modulos.show', [$modulo->idCurso]));
    }

    /**
     * Display the specified Modulo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unidade = UnidadeController::getUnidade();
        $modulos = DB::table('modulos')->where([['idCurso', '=', $id], ['deleted_at', '=', null]])->get();
        $curso = DB::table('curso')->where('id', $id)->get()->first();

        return view('modulos.index', ['modulos' => $modulos, 'idCurso' => $id, 'curso' => $curso]);
    }

    public function add($idCurso){
        return view('modulos.create', ['idCurso' => $idCurso]);
    }

    /**
     * Show the form for editing the specified Modulo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modulo = $this->moduloRepository->find($id);

        if (empty($modulo)) {
            Flash::error('Modulo not found');

            return redirect(route('modulos.index'));
        }

        return view('modulos.edit')->with('modulo', $modulo);
    }

    /**
     * Update the specified Modulo in storage.
     *
     * @param int $id
     * @param UpdateModuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModuloRequest $request)
    {
        $modulo = $this->moduloRepository->find($id);

        if (empty($modulo)) {
            Flash::error('Modulo not found');

            return redirect(route('modulos.index'));
        }

        $modulo = $this->moduloRepository->update($request->all(), $id);

        Flash::success('Modulo updated successfully.');

        return redirect(route('modulos.index'));
    }

    /**
     * Remove the specified Modulo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modulo = $this->moduloRepository->find($id);
        $idCurso = $modulo->idCurso;

        if (empty($modulo)) {
            Flash::error('Módulo não encontrado.');

            return redirect(route('modulos.index'));
        }

        $this->moduloRepository->delete($id);

        Flash::success('Módulo deletado com sucesso.');

        return redirect(route('modulos.show', [$idCurso]));
    }
}
