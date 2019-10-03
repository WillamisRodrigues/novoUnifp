<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/exportarRecebimentos', ['uses' => 'PdfController@exportarRecebimentos']);

Route::get('/exportarPrevisao', ['uses' => 'PdfController@exportarPrevisao']);

Route::get('/AlunosTurma/{idTurma}', ['uses' => 'AlunoTurmaController@show']);

Route::get('/gerarRelatorio', ['uses' => 'PdfController@gerarRelatorio']);

Route::get('/gerarCsv', ['uses' => 'ExportarCsvController@gerarCsv']);

Route::get('/detalhesContrato/{id}', ['uses' => 'ContratoController@contrato']);

Route::get('/contratos/addContrato/{idCurso}', ['uses' => 'ContratoController@create']);

Route::get('/turmasCursos/{idCurso}', ['uses' => 'TurmaCursoController@show']);

Route::get('/comunicados/addComunidado/{matricula}', ['uses' => 'ComunicadosController@create']);

Route::get('/gerarRecibo/{numeroDocumento}/{idAluno}', ['uses' => 'PdfController@gerarRecibo']);

Route::get('formasPagamentos/adicionarPagamento/{idCurso}', ['uses' => 'FormasPagamentoController@create']);

Route::get('formasPagamentos/deletar/{idPagamento}', ['uses' => 'FormasPagamentoController@destroy']);

Route::get('/pagamentos/lancar/{idPagamento}/{idAluno}', ['uses' => 'PagamentoController@lancamento']);

Route::get('/notas/{idAluno}', ['uses' => 'PagamentoController@notas']);

Route::get('/avaliacoes/{idCurso}', ['uses' => 'CursoController@provas']);

Route::get('/avaliacoes/addProva/{idCurso}', ['uses' => 'CursoController@addProva']);

Route::get('/avaliacoes/deletar/{idCurso}', ['uses' => 'CursoController@addProva']);

Route::get('/lancamentos-avancado', ['uses' => 'LancamentoController@avancado']);

Route::get('/modulos/adicionarModulo/{idCurso}', ['uses' => 'ModuloController@add']);

Route::get('termoCancelamento/{idAluno}', ['uses' => 'PdfController@cancelamento']);

Route::get('frequencia/edit/{id}', ['uses' => 'PresencaController@edit', 'as' => 'frequencia.edit']);

Route::get('administradores', ['uses' => 'usuarioController@admin', 'as' => 'administradores']);

Route::post('/formularioPagamento', ['uses' => 'PagamentoController@store']);

Route::post('filtropresenca', ['uses' => 'PresencaController@filtrar', 'as' => 'filtro.presenca']);

Route::post('storeProva', ['uses' => 'CursoController@storeProva']);

Route::post('escolherUnidade', ['uses' => 'EscolherUnidadeController@escolher']);

Route::post('buscaAvancada', ['uses' => 'LancamentoController@buscaAvancada']);

Route::post('filtroLancamentos', ['uses' => 'LancamentoController@filtroLancamentos']);

Route::post('filtro-receitas', ['as' => 'filtroReceitas', 'uses' => 'RelatoriosController@filtroDespesas']);

Route::post('filtroAlunosAtrasados', ['as' => 'filtroAlunosAtrasados', 'uses' => 'RelatoriosController@filtroAlunosAtrasados']);

Route::post('filtroGeralAlunos', ['as' => 'filtroGeralAlunos', 'uses' => 'RelatoriosController@filtroGeralAlunos']);

Route::post('filtroRecebimentos', ['as' => 'filtroRecebimentos', 'uses' => 'RelatoriosController@filtroRecebimentos']);

Route::post('atualizarPermissoes', ['as' => 'atualizarPermissoes', 'uses' => 'nivelAcessoController@atualizarPermissoes']);

Route::resource('agendas', 'AgendaController')->middleware('canAtLeast:agenda.index');

Route::resource('agendasArquivada', 'AgendasArquivadaController')->middleware('canAtLeast:agenda.index');

Route::resource('unidades', 'UnidadeController')->middleware('canAtLeast:unidades.index');

Route::resource('escolaridades', 'EscolaridadeController')->middleware('canAtLeast:escolaridades.index');

Route::resource('tempoAulas', 'TempoAulaController')->middleware('canAtLeast:tempo_aulas.index');

Route::resource('nivelAcessos', 'nivelAcessoController')->middleware('canAtLeast:nivel_acesso.index');

Route::resource('usuarios', 'usuarioController')->middleware('canAtLeast:usuarios.index');

Route::resource('visitantes', 'visitanteController')->middleware('canAtLeast:visitantes.index');

Route::resource('funcionarios', 'FuncionarioController')->middleware('canAtLeast:funcionarios.index');

Route::resource('fornecedors', 'FornecedorController')->middleware('canAtLeast:fornecedores.index');

Route::resource('horarios', 'HorarioController')->middleware('canAtLeast:horarios.index');

Route::resource('diasSemanas', 'DiasSemanaController')->middleware('canAtLeast:dias_semanas.index');

Route::resource('ajudas', 'AjudaController')->middleware('canAtLeast:ajudas.index');

Route::resource('alunos', 'AlunoController')->middleware('canAtLeast:alunos.index');

Route::resource('cursos', 'CursoController')->middleware('canAtLeast:cursos.index');

Route::resource('formasPagamentos', 'FormasPagamentoController')->middleware('canAtLeast:forma_pagamento.index');

Route::resource('turmas', 'TurmaController')->middleware('canAtLeast:turmas.index');

Route::resource('turmasInativas', 'TurmaInativaController')->middleware('canAtLeast:turmas.index');

Route::resource('aulasCronogramas', 'AulasCronogramaController')->middleware('canAtLeast:aulas_cronogramas.index');

Route::resource('cronogramas', 'CronogramaController')->middleware('canAtLeast:cronogramas.index');

Route::resource('centroCustos', 'CentroCustoController')->middleware('canAtLeast:centro_custos.index');

Route::resource('caixas', 'CaixaController')->middleware('canAtLeast:caixas.index');

Route::resource('lancamentos', 'LancamentoController')->middleware('canAtLeast:lancamentos.index');

Route::resource('aniversarios', 'AniversarioController')->middleware('canAtLeast:funcionarios.index');

Route::resource('presenca', 'PresencaController')->middleware('canAtLeast:controles.index');

Route::resource('pagamento', 'PagamentoController')->middleware('canAtLeast:pagamentos.index');

Route::resource('frequencias', 'FrequenciaController')->middleware('canAtLeast:controles.index');

Route::resource('comoConheceus', 'ComoConheceuController')->middleware('canAtLeast:como_conheceu.index');

Route::resource('formaPgtos', 'FormaPgtoController')->middleware('canAtLeast:forma_pagamento.index');

Route::resource('pagtos', 'PagtoController')->middleware('canAtLeast:pagamentos.index');

Route::resource('comunicados', 'ComunicadosController')->middleware('canAtLeast:comunicados.index');

Route::resource('contratos', 'ContratoController')->middleware('canAtLeast:contratos.index');

Route::resource('pdf', 'PdfController')->middleware('canAtLeast:relatorios.index');

Route::resource('diasVencimentos', 'DiasVencimentoController')->middleware('canAtLeast:dias_vencimentos.index');

Route::resource('pagamentos', 'PagamentosController')->middleware('canAtLeast:pagamentos.index');

Route::resource('modulos', 'ModuloController')->middleware('canAtLeast:nivel_acesso.index');

Route::resource('permissions', 'PermissionController')->middleware('canAtLeast:nivel_acesso.index');

Route::resource('roles', 'RolesController')->middleware('canAtLeast:nivel_acesso.index');
