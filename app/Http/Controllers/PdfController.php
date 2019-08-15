<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Arr;


class PdfController extends Controller
{
    //
    public function index()
    {
        return view('pdf.index');
    }
    public function gerarCarne($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id);

        $pdf = PDF::loadView('pdf.carne', ['alunos' => $aluno]);
        return $pdf->stream('invoice.pdf');;
    }

    public function gerarContrato($id)
    {
        $aluno = DB::table('aluno')->get()->where('id', $id);

        //pega id das relações referentes a tabela aluno
        $idUnidade = 1;
        // $idCurso = Arr::get($aluno, 'Curso');
        $idCurso = 1;
        // $idParcelamento = Arr::get($aluno, 'Parcelamento');
        $idParcelamento = 1;
        // $idTurma = Arr::get($aluno, 'Parcelamento');
        $idTurma = 1;

        //pegar dados das tabelas com base nos relacionamentos
        $unidades = DB::table('unidade')->get()->where('id', $idUnidade);
        foreach ($unidades as $unidade) {
            $dadosUnidade = [$unidade->NomeUnidade, $unidade->CNPJ, $unidade->Endereco, $unidade->Bairro, $unidade->Cidade, $unidade->UF, $unidade->Telefone1];
        }
        $formas_parcelamentos = DB::table('formas_pagamento')->get()->where('id', $idParcelamento);
        foreach($formas_parcelamentos as $parcelamento){
            $dadosParcelamento = [$parcelamento->QtdeParcelas, $parcelamento->ParcelaBruta, $parcelamento->BrutoTotal, $parcelamento->DescontoPontualidade];
        }
        $cursos = DB::table('curso')->get()->where('id', $idCurso);
        foreach($cursos as $curso){
            $dadosCursos = [$curso->nomeCurso, $curso->QtdeAulas, $curso->CargaHoraria];
        }
        $turmas = DB::table('turma')->get()->where('id', $idTurma);
        foreach($turmas as $turma){
            $dadosTurmas = [$turma->NomeTurma, $turma->DataInicio, $turma->Periodo, $turma->DiasDaSemana];
        }

        // dd($aluno);

        // $pdf = PDF::loadView('pdf.contrato', ['alunos' => $aluno]);
        $pdf = PDF::loadView('pdf.contrato', ['alunos' => $aluno, 'cursos' => $dadosCursos, 'unidades' => $dadosUnidade, 'parcelamentos' => $dadosParcelamento, 'turmas' => $dadosTurmas]);
        return $pdf->stream('invoice.pdf');;
    }
}
