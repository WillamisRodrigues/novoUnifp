<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCronogramaRequest;
use App\Http\Requests\UpdateCronogramaRequest;
use App\Repositories\CronogramaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


use Flash;
use Response;

class CronogramaController extends AppBaseController
{
    /** @var  CronogramaRepository */
    private $cronogramaRepository;

    public function __construct(CronogramaRepository $cronogramaRepo)
    {
        $this->cronogramaRepository = $cronogramaRepo;
    }

    /**
     * Display a listing of the Cronograma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $cronogramas = $this->cronogramaRepository->all();

        $unidade = Session::get('unidade');
        $cronogramas = DB::table('cronograma')->where([['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        return view('cronogramas.index')->with('cronogramas', $cronogramas);
    }

    /**
     * Show the form for creating a new Cronograma.
     *
     * @return Response
     */
    public function create()
    {
        return view('cronogramas.create');
    }

    /**
     * Store a newly created Cronograma in storage.
     *
     * @param CreateCronogramaRequest $request
     *
     * @return Response
     */
    public function store(CreateCronogramaRequest $request)
    {
        $input = $request->all();

        $cronograma = $this->cronogramaRepository->create($input);
        $unidade = Session::get('unidade');
        DB::table('cronograma')->where('id', $cronograma->id)->update(['idUnidade' => $unidade]);

        Flash::success('Cronograma salvo com sucesso.');

        return redirect(route('cronogramas.index'));
    }

    /**
     * Display the specified Cronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cronograma = $this->cronogramaRepository->find($id);

        if (empty($cronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('cronogramas.index'));
        }

        return view('cronogramas.show')->with('cronograma', $cronograma);
    }

    /**
     * Show the form for editing the specified Cronograma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cronograma = $this->cronogramaRepository->find($id);

        if (empty($cronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('cronogramas.index'));
        }

        return view('cronogramas.edit')->with('cronograma', $cronograma);
    }

    /**
     * Update the specified Cronograma in storage.
     *
     * @param int $id
     * @param UpdateCronogramaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCronogramaRequest $request)
    {
        $cronograma = $this->cronogramaRepository->find($id);

        if (empty($cronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('cronogramas.index'));
        }

        $cronograma = $this->cronogramaRepository->update($request->all(), $id);

        Flash::success('Cronograma atualizado com sucesso.');

        return redirect(route('cronogramas.index'));
    }

    /**
     * Remove the specified Cronograma from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cronograma = $this->cronogramaRepository->find($id);

        if (empty($cronograma)) {
            Flash::error('Cronograma não encontrado.');

            return redirect(route('cronogramas.index'));
        }

        $this->cronogramaRepository->delete($id);

        Flash::success('Cronograma deletado com sucesso.');

        return redirect(route('cronogramas.index'));
    }
}
