<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportarLancamentos implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dados = DB::table('caixa')->select('Tipo','Via','FormaPgto','Status','Descricao','Aluno','Lancamento','Vencimento','Valor','CentroCusto','ContaCaixa','Usuario','Data')->get();
        return $dados;
    }
}
