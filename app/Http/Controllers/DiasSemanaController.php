<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiasSemanaRequest;
use App\Http\Requests\UpdateDiasSemanaRequest;
use App\Repositories\DiasSemanaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiasSemanaController extends AppBaseController
{
    /** @var  DiasSemanaRepository */
    private $diasSemanaRepository;

    public function __construct(DiasSemanaRepository $diasSemanaRepo)
    {
        $this->diasSemanaRepository = $diasSemanaRepo;
    }

    /**
     * Display a listing of the DiasSemana.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $diasSemanas = $this->diasSemanaRepository->all();

        return view('dias_semanas.index')
            ->with('diasSemanas', $diasSemanas);
    }

    /**
     * Show the form for creating a new DiasSemana.
     *
     * @return Response
     */
    public function create()
    {
        return view('dias_semanas.create');
    }

    /**
     * Store a newly created DiasSemana in storage.
     *
     * @param CreateDiasSemanaRequest $request
     *
     * @return Response
     */
    public function store(CreateDiasSemanaRequest $request)
    {
        $input = $request->all();

        $diasSemana = $this->diasSemanaRepository->create($input);

        Flash::success('Dia de Aula adicionado com sucesso.');

        return redirect(route('diasSemanas.index'));
    }

    /**
     * Display the specified DiasSemana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $diasSemana = $this->diasSemanaRepository->find($id);

        if (empty($diasSemana)) {
            Flash::error('Dia de Aula não encontrado.');

            return redirect(route('diasSemanas.index'));
        }

        return view('dias_semanas.show')->with('diasSemana', $diasSemana);
    }

    /**
     * Show the form for editing the specified DiasSemana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $diasSemana = $this->diasSemanaRepository->find($id);

        if (empty($diasSemana)) {
            Flash::error('Dia de Aula não encontrado.');

            return redirect(route('diasSemanas.index'));
        }

        return view('dias_semanas.edit')->with('diasSemana', $diasSemana);
    }

    /**
     * Update the specified DiasSemana in storage.
     *
     * @param int $id
     * @param UpdateDiasSemanaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiasSemanaRequest $request)
    {
        $diasSemana = $this->diasSemanaRepository->find($id);

        if (empty($diasSemana)) {
            Flash::error('Dia de Aula não encontrado.');

            return redirect(route('diasSemanas.index'));
        }

        $diasSemana = $this->diasSemanaRepository->update($request->all(), $id);

        Flash::success('Dia de Aula atualizado com sucesso.');

        return redirect(route('diasSemanas.index'));
    }

    /**
     * Remove the specified DiasSemana from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $diasSemana = $this->diasSemanaRepository->find($id);

        if (empty($diasSemana)) {
            Flash::error('Dia de Aula não encontrado.');

            return redirect(route('diasSemanas.index'));
        }

        $this->diasSemanaRepository->delete($id);

        Flash::success('Dia de Aula deletado com sucesso .');

        return redirect(route('diasSemanas.index'));
    }
}
