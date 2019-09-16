<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
        $alunosAtivos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '=', 'Estudando']])->get();
        $alunosInativos = DB::table('aluno')->where([['deleted_at', '=', null], ['idUnidade', '=', $unidade], ['Status', '<>', 'Estudando']])->get();
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
        $emDia = DB::table('pagamentos')->where([['deleted_at', '=', null], ['Status', '<>', 'Vencido'], ['idUnidade', '=', $unidade]])->get();
        $atrasados = DB::table('pagamentos')->where([['deleted_at', '=', null], ['Status', '=', 'Vencido'], ['idUnidade', '=', $unidade]])->get();

        //receitas
        $unidade = UnidadeController::getUnidade();
        $ano = date("Y");

        $janeiroInicio =    "$ano-01-01";
        $janeiroFim =       "$ano-01-31";
        $fevereiroInicio =  "$ano-02-01";
        $fevereiroFim =     "$ano-02-31";
        $marcoInicio =      "$ano-03-01";
        $marcoFim =         "$ano-03-31";
        $abrilInicio =      "$ano-04-01";
        $abrilFim =         "$ano-04-31";
        $maioInicio =       "$ano-05-01";
        $maioFim =          "$ano-05-31";
        $junhoInicio =      "$ano-06-01";
        $junhoFim =         "$ano-06-31";
        $julhoInicio =      "$ano-07-01";
        $julhoFim =         "$ano-07-31";
        $agostoInicio =     "$ano-08-01";
        $agostoFim =        "$ano-08-31";
        $setembroInicio =   "$ano-09-01";
        $setembroFim =      "$ano-09-31";
        $outubroInicio =    "$ano-10-01";
        $outubroFim =       "$ano-10-31";
        $novembroInicio =   "$ano-11-01";
        $novembroFim =      "$ano-11-31";
        $dezembroInicio =   "$ano-12-01";
        $dezembroFim =      "$ano-12-31";

        $pgJan = DB::select('select SUM(Valor) as sumJan from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $janeiroInicio, $janeiroFim]);
        $pgFev = DB::select('select SUM(Valor) as sumFev from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $fevereiroInicio, $fevereiroFim]);
        $pgMar = DB::select('select SUM(Valor) as sumMar from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $marcoInicio, $marcoFim]);
        $pgAbr = DB::select('select SUM(Valor) as sumAbr from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $abrilInicio, $abrilFim]);
        $pgMai = DB::select('select SUM(Valor) as sumMai from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $maioInicio, $maioFim]);
        $pgJun = DB::select('select SUM(Valor) as sumJun from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $junhoInicio, $junhoFim]);
        $pgJul = DB::select('select SUM(Valor) as sumJul from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $julhoInicio, $julhoFim]);
        $pgAgo = DB::select('select SUM(Valor) as sumAgo from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $agostoInicio, $agostoFim]);
        $pgSet = DB::select('select SUM(Valor) as sumSet from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $setembroInicio, $setembroFim]);
        $pgOut = DB::select('select SUM(Valor) as sumOut from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $outubroInicio, $outubroFim]);
        $pgNov = DB::select('select SUM(Valor) as sumNov from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $novembroInicio, $novembroFim]);
        $pgDez = DB::select('select SUM(Valor) as sumDez from pagamentos where idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $dezembroInicio, $dezembroFim]);

        // despesas
        $caixaJan = DB::select('select SUM(Valor) as sumJan from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $janeiroInicio, $janeiroFim]);
        $caixaFev = DB::select('select SUM(Valor) as sumFev from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $fevereiroInicio, $fevereiroFim]);
        $caixaMar = DB::select('select SUM(Valor) as sumMar from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $marcoInicio, $marcoFim]);
        $caixaAbr = DB::select('select SUM(Valor) as sumAbr from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $abrilInicio, $abrilFim]);
        $caixaMai = DB::select('select SUM(Valor) as sumMai from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $maioInicio, $maioFim]);
        $caixaJun = DB::select('select SUM(Valor) as sumJun from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $junhoInicio, $junhoFim]);
        $caixaJul = DB::select('select SUM(Valor) as sumJul from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $julhoInicio, $julhoFim]);
        $caixaAgo = DB::select('select SUM(Valor) as sumAgo from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $agostoInicio, $agostoFim]);
        $caixaSet = DB::select('select SUM(Valor) as sumSet from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $setembroInicio, $setembroFim]);
        $caixaOut = DB::select('select SUM(Valor) as sumOut from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $outubroInicio, $outubroFim]);
        $caixaNov = DB::select('select SUM(Valor) as sumNov from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $novembroInicio, $novembroFim]);
        $caixaDez = DB::select('select SUM(Valor) as sumDez from caixa where Tipo = "Sangria" and idUnidade=? and Vencimento > ? and Vencimento < ?;', [$unidade, $dezembroInicio, $dezembroFim]);

        //idades
        $qtdeIdades1 = 0;
        $qtdeIdades2 = 0;
        $qtdeIdades3 = 0;
        $qtdeIdades4 = 0;
        $qtdeIdades5 = 0;
        foreach ($alunosAtivos as $aluno) {
            $age = $this->idade($aluno->NascimentoAluno);
            switch (true) {
                case ($age <= 20):
                    $qtdeIdades1++;
                    break;
                case ($age > 20 && $age <= 28):
                    $qtdeIdades2++;
                    break;
                case ($age > 28 && $age <= 40):
                    $qtdeIdades3++;
                    break;
                case ($age > 40 && $age <= 55):
                    $qtdeIdades4++;
                    break;
                case ($age > 55):
                    $qtdeIdades5++;
                    break;
            }
        }

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

        #gráfico de matriculas por dia do mes atual
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

        # gráfco de receitas e despesas por mes no ano atual
        $finances->addStringColumn('Mês')
            ->addNumberColumn('Receitas')
            ->addNumberColumn('Despesas')
            ->addRow(['Jan', $pgJan[0]->sumJan, $caixaJan[0]->sumJan])
            ->addRow(['Fev', $pgFev[0]->sumFev, $caixaFev[0]->sumFev])
            ->addRow(['Mar', $pgMar[0]->sumMar, $caixaMar[0]->sumMar])
            ->addRow(['Abr', $pgAbr[0]->sumAbr, $caixaAbr[0]->sumAbr])
            ->addRow(['Mai', $pgMai[0]->sumMai, $caixaMai[0]->sumMai])
            ->addRow(['Jun', $pgJun[0]->sumJun, $caixaJun[0]->sumJun])
            ->addRow(['Jul', $pgJul[0]->sumJul, $caixaJul[0]->sumJul])
            ->addRow(['Ago', $pgAgo[0]->sumAgo, $caixaAgo[0]->sumAgo])
            ->addRow(['Set', $pgSet[0]->sumSet, $caixaSet[0]->sumSet])
            ->addRow(['Out', $pgOut[0]->sumOut, $caixaOut[0]->sumOut])
            ->addRow(['Nov', $pgNov[0]->sumNov, $caixaNov[0]->sumNov])
            ->addRow(['Dez', $pgDez[0]->sumDez, $caixaDez[0]->sumDez]);

        # gráfico de alunos por idade
        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['0 a 20 anos', $qtdeIdades1])
            ->addRow(['21 a 28 anos', $qtdeIdades2])
            ->addRow(['29 a 40 anos', $qtdeIdades3])
            ->addRow(['41 a 55 anos', $qtdeIdades4])
            ->addRow(['+ de 55 anos', $qtdeIdades5]);

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
        $vendedores = DB::table('aluno')->selectRaw('Vendedor, COUNT(*) as count')->where('idUnidade', $unidade)->groupBy('Vendedor')->orderBy('count', 'desc')->get();
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
    public function idade($idade)
    {
        $dateSrc = $idade;
        $birthDate = date('d/m/Y', strtotime($dateSrc));
        $birthDate = explode("/", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));

        return $age;
    }
}
