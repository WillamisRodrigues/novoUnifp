<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFrequenciaRequest;
use App\Http\Requests\UpdateFrequenciaRequest;
use App\Repositories\FrequenciaRepository;
use App\Repositories\AlunoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FrequenciaController extends AppBaseController
{
    /** @var  FrequenciaRepository */
    private $frequenciaRepository;

    public function __construct(FrequenciaRepository $frequenciaRepo, AlunoRepository $alunoRepo)
    {
        $this->frequenciaRepository = $frequenciaRepo;
        $this->alunoRepository = $alunoRepo;
    }

    /**
     * Display a listing of the Frequencia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('controles.index');
        $frequencias = $this->frequenciaRepository->all();

        return view('frequencias.index')
            ->with('frequencias', $frequencias);
    }

    /**
     * Show the form for creating a new Frequencia.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('controles.update');
        return view('frequencias.create');
    }

    /**
     * Store a newly created Frequencia in storage.
     *
     * @param CreateFrequenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateFrequenciaRequest $request)
    {
        PermissionController::temPermissao('controles.update');
        $input = $request->all();

        $frequencia = $this->frequenciaRepository->create($input);

        Flash::success('Frequencia salva com sucesso.');

        return redirect(route('frequencias.index'));
    }

    /**
     * Display the specified Frequencia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('controles.index');
        $alunos = $this->alunoRepository->all()->where('id',$id);
        $frequencias = $this->frequenciaRepository->all()->where('idAluno', $id);
        // $frequencias = $this->frequenciaRepository->all();

        if (empty($frequencias)) {
            Flash::error('Frequencia não encontrada.');

            return redirect(route('frequencias.index'));
        }

        return view('frequencias.show', ['frequencias' => $frequencias, 'alunos' => $alunos]);
    }

    /**
     * Show the form for editing the specified Frequencia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('controles.edit');
        $frequencia = $this->frequenciaRepository->find($id);

        if (empty($frequencia)) {
            Flash::error('Frequencia não encontrada.');

            return redirect(route('frequencias.index'));
        }

        return view('frequencias.edit')->with('frequencia', $frequencia);
    }

    /**
     * Update the specified Frequencia in storage.
     *
     * @param int $id
     * @param UpdateFrequenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFrequenciaRequest $request)
    {
        PermissionController::temPermissao('controles.edit');
        $frequencia = $this->frequenciaRepository->find($id);

        if (empty($frequencia)) {
            Flash::error('Frequencia não encontrada.');

            return redirect(route('frequencias.index'));
        }

        $frequencia = $this->frequenciaRepository->update($request->all(), $id);

        Flash::success('Frequencia atualizada com sucesso.');

        return redirect(route('frequencias.index'));
    }

    /**
     * Remove the specified Frequencia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('controles.delete');
        $frequencia = $this->frequenciaRepository->find($id);

        if (empty($frequencia)) {
            Flash::error('Frequencia não encontrada.');

            return redirect(route('frequencias.index'));
        }

        $this->frequenciaRepository->delete($id);

        Flash::success('Frequencia deletada com sucesso.');

        return redirect(route('frequencias.index'));
    }
}
