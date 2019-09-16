<?php

use App\Http\Controllers\UnidadeController;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getTurmas/{unidade}/{id}', function($unidade, $id) {
    $turmas = DB::table('turma')->where([['idUnidade', '=', $unidade], ['idCurso', '=', $id], ['deleted_at', '=', null]])->get();
    $res = array();
    $i = 0;
    foreach ($turmas as $turma) {
        $item = array('id' => $turma->id, 'nome' => $turma->NomeTurma);
        array_push($res, $item);
        $i++;
    }
    return $res;
});

Route::get('getModulos/{unidade}/{id}', function($unidade, $id) {
    $modulos = DB::table('modulos')->where([['idUnidade', '=', $unidade], ['idCurso', '=', $id], ['deleted_at', '=', null]])->get();
    $res = array();
    $i = 0;
    foreach ($modulos as $modulo) {
        $item = array('id' => $modulo->id, 'nome' => $modulo->nomeModulo);
        array_push($res, $item);
        $i++;
    }
    return $res;
});
