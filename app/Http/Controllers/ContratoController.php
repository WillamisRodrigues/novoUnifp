<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Http\Requests\CreateContratoRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateContratoRequest;
use App\Repositories\ContratoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\CursoRepository;

class ContratoController extends AppBaseController
{
    /** @var  ContratoRepository */
    private $contratoRepository;

    public function __construct(ContratoRepository $contratoRepo, CursoRepository $cursoRepo)
    {
        $this->contratoRepository = $contratoRepo;
        $this->cursoRepository = $cursoRepo;
    }

    /**
     * Display a listing of the Contrato.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('contratos.index');
        $contratos = $this->contratoRepository->all();

        return view('contratos.index')
            ->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new Contrato.
     *
     * @return Response
     */
    public function create($id)
    {
        PermissionController::temPermissao('contratos.update');
        $cursos = DB::table('curso')->where([['deleted_at', '=', null], ['id', '=', $id]])->get()->first();

        return view('contratos.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created Contrato in storage.
     *
     * @param CreateContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoRequest $request)
    {
        PermissionController::temPermissao('contratos.update');
        $input = $request->all();

        Arr::set($input, 'Matricula', str_replace(',', '.', Arr::get($input, 'Matricula')));
        Arr::set($input, 'MultaContrato', str_replace(',', '.', Arr::get($input, 'MultaContrato')));
        Arr::set($input, 'MoraContrato', str_replace(',', '.', Arr::get($input, 'MoraContrato')));
        Arr::set($input, 'Multa', str_replace(',', '.', Arr::get($input, 'Multa')));
        Arr::set($input, 'Mora', str_replace(',', '.', Arr::get($input, 'Mora')));

        $contrato = $this->contratoRepository->create($input);

        Flash::success('Contrato saved successfully.');

        $curso = DB::table('curso')->get()->where('id', $input['idCurso'])->first();

        // return redirect(route('contratos.show', ['idCurso' => $input['idCurso'], 'curso' => $curso]));
        return redirect()->action('ContratoController@show', ['idCurso' => $input['idCurso'], 'curso' => $curso]);
    }

    public function contrato($id)
    {
        PermissionController::temPermissao('contratos.index');
        $contrato = DB::table('contratos')->where('id', $id)->get()->first();
        return view('contratos.contrato', ['contrato' => $contrato]);
    }

    /**
     * Display the specified Contrato.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('contratos.index');
        $contratos = DB::table('contratos')->where([['idCurso', '=', $id], ['deleted_at', '=', null]])->get();
        $curso = DB::table('curso')->get()->where('id', $id)->first();

        return view('contratos.show', ['contratos' => $contratos, 'curso' => $curso]);
    }

    /**
     * Show the form for editing the specified Contrato.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('contratos.edit');
        $contrato = $this->contratoRepository->find($id);
        $cursos = DB::table('curso')->where([['deleted_at', '=', null], ['id', '=', $id]])->get()->first();

        if (empty($contrato)) {
            Flash::error('Contrato not found');

            return redirect(route('contratos.index'));
        }
        // $cursos = DB::table('curso')->get();

        return view('contratos.edit', ['cursos' => $cursos, 'contrato' => $contrato]);
    }

    /**
     * Update the specified Contrato in storage.
     *
     * @param int $id
     * @param UpdateContratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoRequest $request)
    {
        PermissionController::temPermissao('contratos.edit');
        $contrato = $this->contratoRepository->find($id);

        if (empty($contrato)) {
            Flash::error('Contrato not found');

            return redirect(route('contratos.index'));
        }

        $contrato = $this->contratoRepository->update($request->all(), $id);

        Flash::success('Contrato updated successfully.');

        return redirect(route('contratos.index'));
    }

    /**
     * Remove the specified Contrato from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('contratos.delete');
        $contrato = $this->contratoRepository->find($id);

        if (empty($contrato)) {
            Flash::error('Contrato not found');

            return redirect(route('contratos.index'));
        }
        $this->contratoRepository->delete($id);

        Flash::success('Contrato deleted successfully.');

        return redirect()->action('ContratoController@show', ['idCurso' => $contrato->idCurso]);
    }
}
