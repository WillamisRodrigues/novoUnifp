<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTempoAulaRequest;
use App\Http\Requests\UpdateTempoAulaRequest;
use App\Repositories\TempoAulaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;

class TempoAulaController extends AppBaseController
{
    /** @var  TempoAulaRepository */
    private $tempoAulaRepository;

    public function __construct(TempoAulaRepository $tempoAulaRepo)
    {
        $this->tempoAulaRepository = $tempoAulaRepo;
    }

    /**
     * Display a listing of the TempoAula.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('tempo_aulas.index');
        $unidade = UnidadeController::getUnidade();
        $tempoAulas = $this->tempoAulaRepository->all();

        return view('tempo_aulas.index')
            ->with('tempoAulas', $tempoAulas);
    }

    /**
     * Show the form for creating a new TempoAula.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('tempo_aulas.update');
        return view('tempo_aulas.create');
    }

    /**
     * Store a newly created TempoAula in storage.
     *
     * @param CreateTempoAulaRequest $request
     *
     * @return Response
     */
    public function store(CreateTempoAulaRequest $request)
    {
        PermissionController::temPermissao('tempo_aulas.update');
        $input = $request->all();

        $tempoAula = $this->tempoAulaRepository->create($input);

        $unidade = UnidadeController::getUnidade();

        DB::table('tempo_aula')->where('id', $tempoAula->id)->update(['idUnidade' => $unidade]);

        Flash::success('Tempo de Aula salvo com sucesso.');

        return redirect(route('tempoAulas.index'));
    }

    /**
     * Display the specified TempoAula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('tempo_aulas.index');
        $tempoAula = $this->tempoAulaRepository->find($id);

        if (empty($tempoAula)) {
            Flash::error('Tempo de aula não encontrado.');

            return redirect(route('tempoAulas.index'));
        }

        return view('tempo_aulas.show')->with('tempoAula', $tempoAula);
    }

    /**
     * Show the form for editing the specified TempoAula.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('tempo_aulas.edit');
        $tempoAula = $this->tempoAulaRepository->find($id);

        if (empty($tempoAula)) {
            Flash::error('Tempo de aula não encontrado.');

            return redirect(route('tempoAulas.index'));
        }

        return view('tempo_aulas.edit')->with('tempoAula', $tempoAula);
    }

    /**
     * Update the specified TempoAula in storage.
     *
     * @param int $id
     * @param UpdateTempoAulaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTempoAulaRequest $request)
    {
        PermissionController::temPermissao('tempo_aulas.edit');
        $tempoAula = $this->tempoAulaRepository->find($id);

        if (empty($tempoAula)) {
            Flash::error('Tempo de aula não encontrado.');

            return redirect(route('tempoAulas.index'));
        }

        $tempoAula = $this->tempoAulaRepository->update($request->all(), $id);

        Flash::success('Tempo de aula atualizado com sucesso.');

        return redirect(route('tempoAulas.index'));
    }

    /**
     * Remove the specified TempoAula from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('tempo_aulas.delete');
        $tempoAula = $this->tempoAulaRepository->find($id);

        if (empty($tempoAula)) {
            Flash::error('Tempo de aula não encontrado.');

            return redirect(route('tempoAulas.index'));
        }

        $this->tempoAulaRepository->delete($id);

        Flash::success('Tempo de aula deletado com sucesso.');

        return redirect(route('tempoAulas.index'));
    }
}
