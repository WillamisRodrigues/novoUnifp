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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('avaliacoes', function () {
    return view('cursos.avaliacoes');
});

Route::get('/carne', function () {
    return view('pdf.carne');
});

Route::get('/funcionarios-aniversario', 'AniversarioController@funcionarios');

Route::get('/professores-aniversario', 'AniversarioController@professores');

Route::get('/professores-listar', 'AniversarioController@professoresListar');

Route::get('/vendedores-listar', 'AniversarioController@vendedoresListar');

Route::get('/relatorio-receitas', 'RelatoriosController@index');

Route::get('/relatorio-despesas', 'RelatoriosController@despesas');

Route::get('/alunosAtrasados', 'RelatoriosController@alunosAtrasados');

Route::get('/geralAlunos', 'RelatoriosController@geralAlunos');

Route::get('/geralRecebimentos', 'RelatoriosController@geralRecebimentos');

Route::get('/previsaoRecebimentos', 'RelatoriosController@previsaoRecebimentos');

Route::get('/gerarCarne/{idAluno}', ['uses' => 'PdfController@gerarCarne']);

Route::get('/gerarContrato/{idAluno}', ['uses' => 'PdfController@gerarContrato']);

Route::get('/AlunosTurma/{idTurma}', ['uses' => 'AlunoTurmaController@show']);

Route::get('/gerarRelatorio', ['uses' => 'PdfController@gerarRelatorio']);

Route::get('/gerarCsv', ['uses' => 'ExportarCsvController@gerarCsv']);

Route::get('/contratos/addContrato/{idCurso}', ['uses' => 'ContratoController@create']);

Route::get('/turmasCursos/{idCurso}', ['uses' => 'TurmaCursoController@show']);

Route::get('/comunicados/addComunidado/{matricula}', ['uses' => 'ComunicadosController@create']);

Route::get('/gerarRecibo/{id}', ['uses' => 'PdfController@gerarRecibo']);

Route::get('/pagamentos/lancar/{idPagamento}/{idAluno}', ['uses' => 'PagamentoController@lancamento']);

Route::get('/notas/{idAluno}', ['uses' => 'PagamentoController@notas']);

Route::post('/formularioPagamento', ['uses' => 'PagamentoController@store']);

Route::resource('agendas', 'AgendaController');

Route::resource('agendasArquivada', 'AgendasArquivadaController');

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

// Route::resource('turmasCursos', 'TurmaCursoController');

Route::resource('aulasCronogramas', 'AulasCronogramaController');

Route::resource('cronogramas', 'CronogramaController');

Route::resource('centroCustos', 'CentroCustoController');

Route::resource('caixas', 'CaixaController');

Route::resource('lancamentos', 'LancamentoController');

Route::resource('aniversarios', 'AniversarioController');

Route::resource('presenca', 'PresencaController');

Route::resource('pagamento', 'PagamentoController');

Route::resource('frequencias', 'FrequenciaController');

Route::resource('comoConheceus', 'ComoConheceuController');

Route::resource('formaPgtos', 'FormaPgtoController');

Route::resource('pagtos', 'PagtoController');

Route::resource('comunicados', 'ComunicadosController');

Route::resource('contratos', 'ContratoController');

Route::resource('pdf', 'PdfController');

Route::resource('diasVencimentos', 'DiasVencimentoController');

Route::resource('pagamentos', 'PagamentosController');
