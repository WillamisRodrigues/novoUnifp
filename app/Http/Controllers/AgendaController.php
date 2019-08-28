<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Repositories\AgendaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Flash;
use Response;

class AgendaController extends AppBaseController
{
    /** @var  AgendaRepository */
    private $agendaRepository;

    public function __construct(AgendaRepository $agendaRepo)
    {
        $this->agendaRepository = $agendaRepo;
    }

    /**
     * Display a listing of the Agenda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $agendas = $this->agendaRepository->all()->where(
        //     ['Arquivado', '==' ,'Não']
        // );

        // $agendas = DB::table('agenda')->get()->where([
        //     ['Arquivado', '=', 'Nao'],
        //     ['deleted_at', '=', null]
        // ]);

        $agendas = DB::select('select * from agenda where Arquivado = ? & deleted_at is null', ['Não']);
        // dd($agendas);

        return view('agendas.index')
            ->with('agendas', $agendas);
    }

    /**
     * Show the form for creating a new Agenda.
     *
     * @return Response
     */
    public function create()
    {
        return view('agendas.create');
    }

    /**
     * Store a newly created Agenda in storage.
     *
     * @param CreateAgendaRequest $request
     *
     * @return Response
     */
    public function store(CreateAgendaRequest $request)
    {
        $input = $request->all();

        $agenda = $this->agendaRepository->create($input);

        Flash::success('Compromisso adicionado com sucesso.');

        return redirect(route('agendas.index'));
    }

    /**
     * Display the specified Agenda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $agenda = $this->agendaRepository->find($id);

        if (empty($agenda)) {
            Flash::error('Compromisso não encontrado.');

            return redirect(route('agendas.index'));
        }

        return view('agendas.show')->with('agenda', $agenda);
    }

    /**
     * Show the form for editing the specified Agenda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $agenda = $this->agendaRepository->find($id);

        if (empty($agenda)) {
            Flash::error('Compromisso não encontrado.');

            return redirect(route('agendas.index'));
        }

        return view('agendas.edit')->with('agenda', $agenda);
    }

    /**
     * Update the specified Agenda in storage.
     *
     * @param int $id
     * @param UpdateAgendaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAgendaRequest $request)
    {
        $agenda = $this->agendaRepository->find($id);

        if (empty($agenda)) {
            Flash::error('Compromisso não encontrado.');

            return redirect(route('agendas.index'));
        }

        $agenda = $this->agendaRepository->update($request->all(), $id);

        Flash::success('Compromisso atualizado com sucesso.');

        return redirect(route('agendas.index'));
    }

    /**
     * Remove the specified Agenda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $agenda = $this->agendaRepository->find($id);

        if (empty($agenda)) {
            Flash::error('Compromisso não encontrado.');

            return redirect(route('agendas.index'));
        }

        $this->agendaRepository->delete($id);

        Flash::success('Compromisso deletado com sucesso.');

        return redirect(route('agendas.index'));
    }
}
