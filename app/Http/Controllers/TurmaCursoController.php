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
        PermissionController::temPermissao('turmas.index');
        $unidade = UnidadeController::getUnidade();
        $turma = DB::select('select * from turma where Status = ? and idCurso = ? and idUnidade = ?', ['Ativa', $id, $unidade]);
        $curso = DB::table('curso')->get();
        $professores = DB::table('funcionario')->where([['Cargo', '=', 'Professor'],['idUnidade', '=', $unidade],['deleted_at', '=', null]])->get();

        // dd($turma);

        // if (empty($turma)) {
        //     Flash::error('Turma não encontrada.');

        //     return redirect(route('turmas.index'));
        // }


        return view('turmasCurso.index', ['turmas' => $turma, 'cursos' => $curso, 'professores' => $professores]);
    }
}
