<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFrequenciaRequest;
use App\Http\Requests\UpdateFrequenciaRequest;
use App\Repositories\FrequenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FrequenciaController extends AppBaseController
{
    /** @var  FrequenciaRepository */
    private $frequenciaRepository;

    public function __construct(FrequenciaRepository $frequenciaRepo)
    {
        $this->frequenciaRepository = $frequenciaRepo;
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
        $frequencias = $this->frequenciaRepository->all()->where('idAluno', $id);
        if (empty($frequencias)) {
            Flash::error('Frequencia não encontrada.');

            return redirect(route('frequencias.index'));
        }

        return view('frequencias.show')->with('frequencias', $frequencias);
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
