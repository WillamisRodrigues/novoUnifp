<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunosAtivos = DB::table('aluno')->where([
            ['deleted_at','=',null],
            ['Status','=','Ativo']
        ])->get();
        $alunosInativos = DB::table('aluno')->where([
            ['deleted_at','=',null],
            ['Status','=','Ativo']
        ])->get();
        $turmas = DB::table('turma')->where([
            ['deleted_at','=',null],
            ['Status','=','Ativa']
        ])->get();
        $cursos = DB::table('curso')->where([
            ['deleted_at','=',null]
        ])->get();
        $professores = DB::table('funcionario')->where([
            ['deleted_at','=',null],
            ['Inativo','=','Nao'],
            ['Cargo','=','Professor']
        ])->get();
        $visitas = DB::table('visita')->where([
            ['deleted_at','=',null]
        ])->get();

        $qtdeAlunosAtivos = 0;
        foreach($alunosAtivos as $aluno){
            $qtdeAlunosAtivos++;
        }

        $qtdeAlunosInativos = 0;
        foreach($alunosInativos as $aluno){
            $qtdeAlunosInativos++;
        }

        $qtdeTurmas = 0;
        foreach($turmas as $aluno){
            $qtdeTurmas++;
        }

        $qtdeCursos = 0;
        foreach($cursos as $aluno){
            $qtdeCursos++;
        }

        $qtdeProfessores = 0;
        foreach($professores as $aluno){
            $qtdeProfessores++;
        }

        $qtdeVisitas = 0;
        foreach($visitas as $aluno){
            $qtdeVisitas++;
        }

        return view('home', [
            'AlunosAtivos' => $qtdeAlunosAtivos,
            'AlunosInativos' => $qtdeAlunosInativos,
            'Turmas' => $qtdeTurmas,
            'Cursos' => $qtdeCursos,
            'Professores' => $qtdeProfessores,
            'Visitas' => $qtdeVisitas
        ]);
    }
}
