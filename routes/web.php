<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('agendas', 'AgendaController');

Route::resource('unidades', 'UnidadeController');

Route::resource('escolaridades', 'EscolaridadeController');

Route::resource('tempoAulas', 'TempoAulaController');

Route::resource('nivelAcessos', 'nivelAcessoController');

Route::resource('usuarios', 'usuarioController');

Route::resource('visitantes', 'visitanteController');

Route::resource('funcionarios', 'FuncionarioController');

Route::resource('fornecedors', 'FornecedorController');

Route::resource('horarios', 'HorarioController');

Route::resource('diasSemanas', 'DiasSemanaController');

Route::resource('ajudas', 'AjudaController');

Route::resource('alunos', 'AlunoController');

Route::resource('cursos', 'CursoController');

Route::resource('formasPagamentos', 'FormasPagamentoController');

Route::resource('turmas', 'TurmaController');

Route::resource('turmasInativas', 'TurmaInativaController');

Route::resource('aulasCronogramas', 'AulasCronogramaController');

Route::resource('cronogramas', 'CronogramaController');

Route::resource('centroCustos', 'CentroCustoController');

Route::resource('caixas', 'CaixaController');

Route::resource('lancamentos', 'LancamentoController');

Route::resource('aniversarios', 'AniversarioController');

Route::resource('presenca', 'PresencaController');

Route::resource('pagamentos', 'PagamentoController');


Route::get('/funcionarios-aniversario', 'AniversarioController@funcionarios');
Route::get('/professores-aniversario', 'AniversarioController@professores');
Route::get('/professores-listar', 'AniversarioController@professoresListar');
Route::get('/vendedores-listar', 'AniversarioController@vendedoresListar');
Route::get('/relatorio-receitas', 'RelatoriosController@index');


Route::resource('frequencias', 'FrequenciaController');

Route::resource('comoConheceus', 'ComoConheceuController');

Route::resource('formaPgtos', 'FormaPgtoController');

Route::resource('pagtos', 'PagtoController');
