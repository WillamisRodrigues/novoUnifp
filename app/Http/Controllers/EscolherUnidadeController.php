<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EscolherUnidadeController extends Controller
{
    public function escolher(Request $request){
        $_SESSION["unidade"] = $request->idUnidade;
        return redirect(route('unidades.index'));
    }
}
