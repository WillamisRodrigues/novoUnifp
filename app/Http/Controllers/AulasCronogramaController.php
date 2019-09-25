<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateAulasCronogramaRequest;
use App\Http\Requests\UpdateAulasCronogramaRequest;
use App\Repositories\AulasCronogramaRepository;
use Illuminate\Support\Arr;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Flash;
use Response;

class AulasCronogramaController extends AppBaseController
{
    /** @var  AulasCronogramaRepository */
    private $aulasCronogramaRepository;

    public function __construct(AulasCronogramaRepository $aulasCronogramaRepo)
    {
        $this->aulasCronogramaRepository = $aulasCronogramaRepo;
    }

    /**
     * Display a listing of the AulasCronograma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('aulas_cronogramas.index');
        $aulasCronogramas = $this->aulasCronogramaRepository->all();

        return view('aulas_cronogramas.index')
            ->with('aulasCronogramas', $aulasCronogramas);
    }

    /**
     * Show the form for creating a new AulasCronograma.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('aulas_cronogramas.update');
        $unidade = UnidadeController::getUnidade();
        $cronogramas = DB::table('cronograma')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();
        $dias = DB::table('dias_semana')->get();
        return view('aulas_cronogramas.create', ['cronogramas' => $cronogramas, 'dias' => $dias ]);
    }

    /**
     * Store a newly created AulasCronograma in storage.
     *
     * @param CreateAulasCronogramaRequest $request
     *
     * @return Response
     */
    public function store(CreateAulasCronogramaRequest $request)
    {
        PermissionController::temPermissao('aulas_cronogramas.update');
        $input = $request->all();

        $aulasCronograma = $this->aulasCronogramaRepository->create($input);
        $aulasCronogramas = $this->aulasCronogramaRepository->all()->where('idCronograma', $request->idCronograma);
        Flash::success('Cronograma criado com sucesso.');

        $cronograma = $request->idCronograma;

        return redirect(route('aulasCronogramas.show', ['id' => $cronograma]));
    }

    /**
     * Display the specified AulasCronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('aulas_cronogramas.index');
        $aulasCronograma = $this->aulasCronogramaRepository->all()->where('idCronograma', $id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        return view('aulas_cronogramas.index')->with('aulasCronogramas', $aulasCronograma);
    }

    /**
     * Show the form for editing the specified AulasCronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('aulas_cronogramas.edit');
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);
        $cronogramas = DB::table('cronograma')->get() ;

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        return view('aulas_cronogramas.edit', ['aulasCronograma' => $aulasCronograma, 'cronogramas' => $cronogramas]);
    }

    /**
     * Update the specified AulasCronograma in storage.
     *
     * @param int $id
     * @param UpdateAulasCronogramaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAulasCronogramaRequest $request)
    {
        PermissionController::temPermissao('aulas_cronogramas.update');
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        $aulasCronograma = $this->aulasCronogramaRepository->update($request->all(), $id);

        Flash::success('Cronograma atualizado com sucesso.');

        return redirect(route('aulasCronogramas.index'));
    }

    /**
     * Remove the specified AulasCronograma from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('aulas_cronogramas.delete');
        $aulasCronograma = $this->aulasCronogramaRepository->find($id);

        if (empty($aulasCronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('aulasCronogramas.index'));
        }

        $this->aulasCronogramaRepository->delete($id);

        Flash::success('Cronograma deletado com sucesso.');

        return redirect(route('aulasCronogramas.index'));
    }
}
