<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use App\Repositories\AgendaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Flash;
use Response;

class AgendasArquivadaController extends Controller
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
        // $agendas = $this->agendaRepository->all()->where('Arquivado', 'Sim');
        $unidade = Session::get('unidade');
        $agendas = DB::table('agenda')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null], ['Arquivado', '=','Sim']])->get();

        return view('agendas.arquivada')
            ->with('agendas', $agendas);
    }


}
