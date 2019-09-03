<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EscolherUnidadeController extends Controller
{
    public function escolher(Request $request){
        Session::put('unidade', $request->idUnidade);
        return redirect(route('unidades.index'));
    }
}
