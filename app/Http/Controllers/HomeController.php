<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // pega o id da unidade com a função getunidade
        $unidade = UnidadeController::getUnidade();

        //captação de dados para alimentação da home
        $alunosAtivos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativo']])->get();
        $alunosInativos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Inativo']])->get();
        $turmas = DB::table('turma')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Ativa']])->get();
        $cursos = DB::table('curso')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get();
        $professores = DB::table('funcionario')->where([['deleted_at', '=', null], ['Inativo', '=', 'Nao'], ['idUnidade', '=', $unidade], ['Cargo', '=', 'Professor']])->get();
        $visitas = DB::table('visita')->where([['idUnidade', '=', $unidade], ['deleted_at', '=', null]])->get();

        $qtdeAlunosAtivos = count($alunosAtivos);
        $qtdeAlunosInativos = count($alunosInativos);
        $qtdeTurmas = count($turmas);
        $qtdeCursos = count($cursos);
        $qtdeProfessores = count($professores);
        $qtdeVisitas = count($visitas);

        //captação de dados para preenchimento dos gráficos
        //matriculas Mes
        $matriculasJan = DB::table('aluno')->where([['created_at', '>', date('Y-01-01 00:00:00')], ['created_at', '<', date('Y-01-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasFev = DB::table('aluno')->where([['created_at', '>', date('Y-02-01 00:00:00')], ['created_at', '<', date('Y-02-29 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasMar = DB::table('aluno')->where([['created_at', '>', date('Y-03-01 00:00:00')], ['created_at', '<', date('Y-03-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasAbr = DB::table('aluno')->where([['created_at', '>', date('Y-04-01 00:00:00')], ['created_at', '<', date('Y-04-30 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasMai = DB::table('aluno')->where([['created_at', '>', date('Y-05-01 00:00:00')], ['created_at', '<', date('Y-05-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasJun = DB::table('aluno')->where([['created_at', '>', date('Y-06-01 00:00:00')], ['created_at', '<', date('Y-06-30 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasJul = DB::table('aluno')->where([['created_at', '>', date('Y-07-01 00:00:00')], ['created_at', '<', date('Y-07-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasAgo = DB::table('aluno')->where([['created_at', '>', date('Y-08-01 00:00:00')], ['created_at', '<', date('Y-08-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasSet = DB::table('aluno')->where([['created_at', '>', date('Y-09-01 00:00:00')], ['created_at', '<', date('Y-09-30 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasOut = DB::table('aluno')->where([['created_at', '>', date('Y-10-01 00:00:00')], ['created_at', '<', date('Y-10-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasNov = DB::table('aluno')->where([['created_at', '>', date('Y-11-01 00:00:00')], ['created_at', '<', date('Y-11-30 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matriculasDez = DB::table('aluno')->where([['created_at', '>', date('Y-12-01 00:00:00')], ['created_at', '<', date('Y-12-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();

        //matriculas por dia no mes atual
        $matricula0 = DB::table('aluno')->where([['created_at', '>', date('Y-m-01 00:00:00')], ['created_at', '<', date('Y-m-03 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula1 = DB::table('aluno')->where([['created_at', '>', date('Y-m-04 00:00:00')], ['created_at', '<', date('Y-m-06 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula2 = DB::table('aluno')->where([['created_at', '>', date('Y-m-07 00:00:00')], ['created_at', '<', date('Y-m-09 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula3 = DB::table('aluno')->where([['created_at', '>', date('Y-m-10 00:00:00')], ['created_at', '<', date('Y-m-12 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula4 = DB::table('aluno')->where([['created_at', '>', date('Y-m-13 00:00:00')], ['created_at', '<', date('Y-m-15 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula5 = DB::table('aluno')->where([['created_at', '>', date('Y-m-16 00:00:00')], ['created_at', '<', date('Y-m-18 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula6 = DB::table('aluno')->where([['created_at', '>', date('Y-m-19 00:00:00')], ['created_at', '<', date('Y-m-21 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula7 = DB::table('aluno')->where([['created_at', '>', date('Y-m-22 00:00:00')], ['created_at', '<', date('Y-m-24 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula8 = DB::table('aluno')->where([['created_at', '>', date('Y-m-25 00:00:00')], ['created_at', '<', date('Y-m-27 23:59:59')], ['idUnidade', '=', $unidade]])->get();
        $matricula9 = DB::table('aluno')->where([['created_at', '>', date('Y-m-28 00:00:00')], ['created_at', '<', date('Y-m-31 23:59:59')], ['idUnidade', '=', $unidade]])->get();

        //sexo dos alunos
        $alunosH = DB::table('aluno')->where([['Sexo', '=', 'Masculino'], ['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get();
        $alunosM = DB::table('aluno')->where([['Sexo', '=', 'Feminino'], ['deleted_at', '=', null], ['idUnidade', '=', $unidade]])->get();

        //nivel de adimplencia
        $emDia = DB::table('pagamentos')->where([['deleted_at', '=', null],/* ['idUnidade', '=', $unidade],*/ ['Status', '<>', 'Atrasado']])->get();
        $atrasados = DB::table('pagamentos')->where([['deleted_at', '=', null],/* ['idUnidade', '=', $unidade],*/ ['Status', '=', 'Vencido']])->get();

        //inicia todos os gráficos
        $MatriculasMes = \Lava::DataTable();
        $MatriculasDia = \Lava::DataTable();
        $finances = \Lava::DataTable();
        $reasons = \Lava::DataTable();
        $alunosSexo = \Lava::DataTable();
        $pagamento = \Lava::DataTable();

        //adiciona as colunas do gráfico e seta os dados da coluna
        $MatriculasMes->addStringColumn('Month')
            ->addNumberColumn('Número de Matrículas')
            ->addRow(['Jan', count($matriculasJan)])
            ->addRow(['Fev', count($matriculasFev)])
            ->addRow(['Mar', count($matriculasMar)])
            ->addRow(['Abr', count($matriculasAbr)])
            ->addRow(['Mai', count($matriculasMai)])
            ->addRow(['Jun', count($matriculasJun)])
            ->addRow(['Jul', count($matriculasJul)])
            ->addRow(['Ago', count($matriculasAgo)])
            ->addRow(['Set', count($matriculasSet)])
            ->addRow(['Out', count($matriculasOut)])
            ->addRow(['Nov', count($matriculasNov)])
            ->addRow(['Dez', count($matriculasDez)]);

        $MatriculasDia->addStringColumn('Month')
            ->addNumberColumn('Número de Matrículas por Dia')
            ->addRow(['01', count($matricula0)])
            ->addRow(['04', count($matricula1)])
            ->addRow(['07', count($matricula2)])
            ->addRow(['10', count($matricula3)])
            ->addRow(['13', count($matricula4)])
            ->addRow(['16', count($matricula5)])
            ->addRow(['19', count($matricula6)])
            ->addRow(['22', count($matricula7)])
            ->addRow(['25', count($matricula8)])
            ->addRow(['28', count($matricula9)]);


        /*
        *   ####################################################################################
        *
        *               FALTA OS DADOS PARA O GRÁFICO DE RECEITAS E DESPESAS
        *
        *              ATUALMENTE OS DADOS ESTÃO SENDO SETADOS ALEATORIAMENTE
        *                APENAS PARA O PREENCHIMENDO DE DADOS E O GRÁFICO
        *                               SER GERADO E EXIBIDO
        *
        *   ####################################################################################
        */

        $finances->addStringColumn('Mês')
            ->addNumberColumn('Receitas')
            ->addNumberColumn('Despesas')
            ->addRow(['Jan', rand(100, 999), rand(100, 999)])
            ->addRow(['Fev', rand(100, 999), rand(100, 999)])
            ->addRow(['Mar', rand(100, 999), rand(100, 999)])
            ->addRow(['Abr', rand(100, 999), rand(100, 999)])
            ->addRow(['Mai', rand(100, 999), rand(100, 999)])
            ->addRow(['Jun', rand(100, 999), rand(100, 999)])
            ->addRow(['Jul', rand(100, 999), rand(100, 999)])
            ->addRow(['Ago', rand(100, 999), rand(100, 999)])
            ->addRow(['Set', rand(100, 999), rand(100, 999)])
            ->addRow(['Out', rand(100, 999), rand(100, 999)])
            ->addRow(['Nov', rand(100, 999), rand(100, 999)])
            ->addRow(['Dez', rand(100, 999), rand(100, 999)]);

        # gráfico de alunos por idade
        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['0 a 20 anos', 20])
            ->addRow(['21 a 28 anos', 20])
            ->addRow(['29 a 40 anos', 20])
            ->addRow(['41 a 55 anos', 20])
            ->addRow(['+ de 55 anos', 20]);

        # gráfico de alunos por sexo
        $alunosSexo->addStringColumn('Alunos por sexo')
            ->addNumberColumn('Sexo')
            ->addRow(['Homens', count($alunosH)])
            ->addRow(['Mulheres', count($alunosM)]);

        # gráfico do nível de adimplencia
        $pagamento->addStringColumn('Nível de adimplência')
            ->addNumberColumn('Sexo')
            ->addRow(['Em dia', count($emDia)])
            ->addRow(['Atrasados', count($atrasados)]);


        # configurações dos gráficos
        # matrículas por mes
        \Lava::AreaChart('MatriculasMes', $MatriculasMes, [
            'title' => 'Matrículas por Mẽs',
            'legend' => [
                'position' => 'top'
            ],
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ]
        ]);

        # matriculas por dia no mes atual
        \Lava::AreaChart('MatriculasDia', $MatriculasDia, [
            'title' => 'Matrículas por Dia',
            'legend' => [
                'position' => 'top'
            ],
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ]
        ]);

        # gráfico de receitas e despesas
        \Lava::ColumnChart('Finances', $finances, [
            'title' => 'Receitas e Despesas',
            'legend' => [
                'position' => 'top'
            ],
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ]
        ]);

        # gráfico de alunos por idade
        \Lava::PieChart('AlunosIdade', $reasons, [
            'title'  => 'Alunos por Idade',
            'is3D'   => true,
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ],
            'colors' => ['#3CAFF0', '#2BA65A', '#79BD9A', '#3B8587', '#14486B']
        ]);

        # gráfico de alunos por sexo
        \Lava::PieChart('AlunosSexo', $alunosSexo, [
            'title'  => 'Alunos por Sexo',
            'is3D'   => true,
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ],
            'colors' => ['#14486B', '#F75A5E']
        ]);

        # gráfico do nível de adimplencia
        \Lava::PieChart('pagamento', $pagamento, [
            'title'  => 'Nível de adimplência',
            'is3D'   => true,
            'titleTextStyle' => [
                'color'    => '#2BA65A',
                'fontSize' => 14
            ],
            'colors' => ['#14486B', '#F75A5E']
        ]);

        // vendedores
        $vendedores = DB::table('aluno')->selectRaw('Vendedor, COUNT(*) as count')->groupBy('Vendedor')->orderBy('count', 'desc')->get();
        $unidades = DB::table('unidade')->where('id', $unidade)->get()->first();

        return view('home', [
            'AlunosAtivos' => $qtdeAlunosAtivos,
            'AlunosInativos' => $qtdeAlunosInativos,
            'Turmas' => $qtdeTurmas,
            'Cursos' => $qtdeCursos,
            'Professores' => $qtdeProfessores,
            'vendedores' => $vendedores,
            'unidades' => $unidades,
            'Visitas' => $qtdeVisitas
        ]);
    }
}
