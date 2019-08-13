<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


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
        return view('pdf.contrato', ['alunos' => $aluno]);
    }
}
