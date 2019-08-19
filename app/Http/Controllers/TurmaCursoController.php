<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Flash;
use Response;

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
        $curso = DB::table('curso')->get();
        // dd($turma);

        // if (empty($turma)) {
        //     Flash::error('Turma não encontrada.');

        //     return redirect(route('turmas.index'));
        // }


        return view('turmasCurso.index', ['turmas' => $turma, 'cursos' => $curso]);
    }
}
