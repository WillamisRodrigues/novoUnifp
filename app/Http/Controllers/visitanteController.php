<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevisitanteRequest;
use App\Http\Requests\UpdatevisitanteRequest;
use App\Repositories\visitanteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Flash;
use Response;

class visitanteController extends AppBaseController
{
    /** @var  visitanteRepository */
    private $visitanteRepository;

    public function __construct(visitanteRepository $visitanteRepo)
    {
        $this->visitanteRepository = $visitanteRepo;
    }

    /**
     * Display a listing of the visitante.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('visitantes.index');
        $unidade = UnidadeController::getUnidade();

        // $visitantes = $this->visitanteRepository->all();
        $visitantes = DB::table('visita')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        return view('visitantes.index')
            ->with('visitantes', $visitantes);
    }

    /**
     * Show the form for creating a new visitante.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('visitantes.update');
        $conheceu = DB::table('como_conheceu')->get();
        return view('visitantes.create', ['comoConheceu' => $conheceu]);
    }

    /**
     * Store a newly created visitante in storage.
     *
     * @param CreatevisitanteRequest $request
     *
     * @return Response
     */
    public function store(CreatevisitanteRequest $request)
    {
        PermissionController::temPermissao('visitantes.update');
        $input = $request->all();

        $visitante = $this->visitanteRepository->create($input);
        $unidade = UnidadeController::getUnidade();
        DB::table('visita')->where('id', $visitante->id)->update(['idUnidade' => $unidade]);

        Flash::success('Cadastro de visitante salvo com sucesso.');

        return redirect(route('visitantes.index'));
    }

    /**
     * Display the specified visitante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('visitantes.index');
        $visitante = $this->visitanteRepository->find($id);

        if (empty($visitante)) {
            Flash::error('Cadastro de visitante não encontrado.');

            return redirect(route('visitantes.index'));
        }

        return view('visitantes.show')->with('visitante', $visitante);
    }



    /**
     * Show the form for editing the specified visitante.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('visitantes.edit');
        $visitante = $this->visitanteRepository->find($id);
        $conheceu = DB::table('como_conheceu')->get();

        if (empty($visitante)) {
            Flash::error('Cadastro de visitante não encontrado.');

            return redirect(route('visitantes.index'));
        }

        return view('visitantes.edit', ['comoConheceu' => $conheceu, 'visitante' => $visitante]);
        // return view('visitantes.edit')->with('visitante', $visitante);
    }

    /**
     * Update the specified visitante in storage.
     *
     * @param int $id
     * @param UpdatevisitanteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevisitanteRequest $request)
    {
        PermissionController::temPermissao('visitantes.edit');
        $visitante = $this->visitanteRepository->find($id);

        if (empty($visitante)) {
            Flash::error('Cadastro de visitante não encontrado.');

            return redirect(route('visitantes.index'));
        }

        $visitante = $this->visitanteRepository->update($request->all(), $id);

        Flash::success('Cadastro de visitante atualizado com sucesso.');

        return redirect(route('visitantes.index'));
    }

    /**
     * Remove the specified visitante from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('visitantes.delete');
        $visitante = $this->visitanteRepository->find($id);

        if (empty($visitante)) {
            Flash::error('Cadastro de visitante não encontrado.');

            return redirect(route('visitantes.index'));
        }

        $this->visitanteRepository->delete($id);

        Flash::success('Cadastro de visitante deletado com sucesso.');

        return redirect(route('visitantes.index'));
    }
}
