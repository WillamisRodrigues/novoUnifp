<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHorarioRequest;
use App\Http\Requests\UpdateHorarioRequest;
use App\Repositories\HorarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HorarioController extends AppBaseController
{
    /** @var  HorarioRepository */
    private $horarioRepository;

    public function __construct(HorarioRepository $horarioRepo)
    {
        $this->horarioRepository = $horarioRepo;
    }

    /**
     * Display a listing of the Horario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $horarios = $this->horarioRepository->all();

        return view('horarios.index')
            ->with('horarios', $horarios);
    }

    /**
     * Show the form for creating a new Horario.
     *
     * @return Response
     */
    public function create()
    {
        return view('horarios.create');
    }

    /**
     * Store a newly created Horario in storage.
     *
     * @param CreateHorarioRequest $request
     *
     * @return Response
     */
    public function store(CreateHorarioRequest $request)
    {
        $input = $request->all();

        $horario = $this->horarioRepository->create($input);

        Flash::success('Horário criado com sucesso.');

        return redirect(route('horarios.index'));
    }

    /**
     * Display the specified Horario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $horario = $this->horarioRepository->find($id);

        if (empty($horario)) {
            Flash::error('Horário não encontrado.');

            return redirect(route('horarios.index'));
        }

        return view('horarios.show')->with('horario', $horario);
    }

    /**
     * Show the form for editing the specified Horario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $horario = $this->horarioRepository->find($id);

        if (empty($horario)) {
            Flash::error('Horário não encontrado.');

            return redirect(route('horarios.index'));
        }

        return view('horarios.edit')->with('horario', $horario);
    }

    /**
     * Update the specified Horario in storage.
     *
     * @param int $id
     * @param UpdateHorarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHorarioRequest $request)
    {
        $horario = $this->horarioRepository->find($id);

        if (empty($horario)) {
            Flash::error('Horário não encontrado.');

            return redirect(route('horarios.index'));
        }

        $horario = $this->horarioRepository->update($request->all(), $id);

        Flash::success('Horário atualizado com sucesso.');

        return redirect(route('horarios.index'));
    }

    /**
     * Remove the specified Horario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $horario = $this->horarioRepository->find($id);

        if (empty($horario)) {
            Flash::error('Horário não encontrado.');

            return redirect(route('horarios.index'));
        }

        $this->horarioRepository->delete($id);

        Flash::success('Horário deletado com sucesso.');

        return redirect(route('horarios.index'));
    }
}
