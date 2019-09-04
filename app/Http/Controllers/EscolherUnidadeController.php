<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EscolherUnidadeController extends Controller
{
    public function escolher(Request $request){
        Session::put('unidade', $request->idUnidade);
        $nomeUnidade = DB::table('unidade')->where('id', Session::get('unidade'))->get()->first();
        Session::put('nomeUnidade', $nomeUnidade->NomeUnidade);

        return redirect(route('unidades.index'));
    }
}
