<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;



class PdfController extends Controller
{
    //
    public function index()
    {
        return view('pdf.index');
    }
    public function gerarCarne($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id)->first();
        $boletos = DB::table('pagamentos')->get()->where('Matricula',$id);

        //pega id das relações
        //falta id da unidade
        $idUnidade = 1;
        $unidades = DB::table('unidade')->get()->where('id', $idUnidade)->first();

        $pdf = PDF::loadView('pdf.carne', ['aluno' => $aluno, 'unidade' => $unidades, 'boletos' => $boletos]);
        return $pdf->stream('invoice.pdf');;
    }

    public function gerarContrato($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id)->first();

        //pega id das relações referentes a tabela aluno
        //falta id da unidade
        $idUnidade = 1;
        $idCurso = $aluno->Curso;
        $idParcelamento = $aluno->Parcelamento;
        $idTurma = $aluno->Turma;

        //pegar dados das tabelas com base nos relacionamentos
        $unidades = DB::table('unidade')->get()->where('id', $idUnidade)->first();
        $formas_parcelamentos = DB::table('formas_pagamento')->get()->where('id', $idParcelamento)->first();
        $cursos = DB::table('curso')->get()->where('id', $idCurso)->first();
        $turmas = DB::table('turma')->get()->where('id', $idTurma)->first();


        $pdf = PDF::loadView('pdf.contrato', ['aluno' => $aluno, 'cursos' => $cursos, 'unidades' => $unidades, 'parcelamentos' => $formas_parcelamentos, 'turmas' => $turmas]);
        return $pdf->stream('invoice.pdf');;
    }
}
