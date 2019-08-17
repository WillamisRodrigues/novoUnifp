<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateTurmaRequest;
use App\Repositories\TurmaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\CursoRepository;

class TurmaCursoController extends Controller
{
    /**
     * Display the specified Turma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turma = DB::select('select * from turma where Status = ? and Curso = ?', ['Ativa', $id]);

        if (empty($turma)) {
            Flash::error('Turma não encontrada.');

            return redirect(route('turmas.index'));
        }

        return view('turmas.index')->with('turmas', $turma);
    }
}
