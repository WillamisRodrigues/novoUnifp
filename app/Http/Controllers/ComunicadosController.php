<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComunicadosRequest;
use App\Http\Requests\UpdateComunicadosRequest;
use App\Repositories\ComunicadosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;
use Response;

class ComunicadosController extends AppBaseController
{
    /** @var  ComunicadosRepository */
    private $comunicadosRepository;

    public function __construct(ComunicadosRepository $comunicadosRepo)
    {
        $this->comunicadosRepository = $comunicadosRepo;
    }

    /**
     * Display a listing of the Comunicados.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comunicados = $this->comunicadosRepository->all();

        return view('comunicados.index')
            ->with('comunicados', $comunicados);
    }

    /**
     * Show the form for creating a new Comunicados.
     *
     * @return Response
     */
    public function create()
    {
        return view('comunicados.create');
    }

    /**
     * Store a newly created Comunicados in storage.
     *
     * @param CreateComunicadosRequest $request
     *
     * @return Response
     */
    public function store(CreateComunicadosRequest $request)
    {
        $input = $request->all();

        $comunicados = $this->comunicadosRepository->create($input);

        Flash::success('Comunicados saved successfully.');

        return redirect(route('comunicados.index'));
    }

    /**
     * Display the specified Comunicados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $comunicados = $this->comunicadosRepository->all();
        $alunos = DB::table('aluno')->get()->where('id', $id);
        $comunicados = DB::table('comunicados')->get()->where('idAluno', $id);
        // $alunos = DB::table('alunos')->where('id', $id);
        // $comunicados = DB::table('comunicados')->where('idAluno', $id);

        if (empty($comunicados)) {
            Flash::error('Comunicados not found');

            return redirect(route('comunicados.index'));
        }

        // return view('comunicados.show')->with('comunicados', $comunicados);
        return view('comunicados.show', ['alunos' => $alunos, 'comunicados' => $comunicados ]);
    }

    /**
     * Show the form for editing the specified Comunicados.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comunicados = $this->comunicadosRepository->find($id);

        if (empty($comunicados)) {
            Flash::error('Comunicados not found');

            return redirect(route('comunicados.index'));
        }

        return view('comunicados.edit')->with('comunicados', $comunicados);
    }

    /**
     * Update the specified Comunicados in storage.
     *
     * @param int $id
     * @param UpdateComunicadosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComunicadosRequest $request)
    {
        $comunicados = $this->comunicadosRepository->find($id);

        if (empty($comunicados)) {
            Flash::error('Comunicados not found');

            return redirect(route('comunicados.index'));
        }

        $comunicados = $this->comunicadosRepository->update($request->all(), $id);

        Flash::success('Comunicados updated successfully.');

        return redirect(route('comunicados.index'));
    }

    /**
     * Remove the specified Comunicados from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comunicados = $this->comunicadosRepository->find($id);

        if (empty($comunicados)) {
            Flash::error('Comunicados not found');

            return redirect(route('comunicados.index'));
        }

        $this->comunicadosRepository->delete($id);

        Flash::success('Comunicados deleted successfully.');

        return redirect(route('comunicados.index'));
    }
}
