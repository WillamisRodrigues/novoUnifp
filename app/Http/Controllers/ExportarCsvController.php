<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportarLancamentos;
use Illuminate\Http\Request;

class ExportarCsvController extends Controller
{
    public function gerarCsv(){
        return Excel::download(new ExportarLancamentos, 'lancamentos.csv');
    }
}
