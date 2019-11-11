@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="" style="padding: 10px 20px">
    <h3>Dashboard</h3>

    {{-- <div id="stocks-chart"></div> --}}
    @areachart('MatriculasMes', 'matriculas-mes')
    @areachart('MatriculasDia', 'matriculas-dia')
    @columnchart('Finances', 'receitas-despesas')

    <div class="row" style="padding: 1rem">
        <div class="col-xs-12 col-sm-6 box-home" style=" padding:2rem; border-radius: 10px;height: 300px">
            <div style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px">
                <div id="matriculas-mes" style="box-shadow: 2px 2px 10px #cccccc"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 box-home" style=" padding:2rem; border-radius: 10px ;height: 300px">
            <div style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px">
                <div id="receitas-despesas" style="box-shadow: 2px 2px 10px #cccccc"></div>
            </div>
        </div>
    </div>
    <div class="row box-home" style="padding: 1rem">
        <div class="col-xs-12 col-sm-12" style=" padding:2rem; border-radius: 10px ;height: 300px">
            <div style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px">
                <div id="matriculas-dia" style="box-shadow: 2px 2px 10px #cccccc"></div>
            </div>
        </div>
    </div>
    <div class="box-home" style="margin-top: 1rem">
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Alunos Ativos</p>
            <div style="font-weight: bolder">  </div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-list"></i> Qtde. Turmas</p>
            <div style="font-weight: bolder"></div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Evasão</p>
            <div style="font-weight: bolder"></div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-list"></i> Qtde. Cursos</p>
            <div style="font-weight: bolder"></div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Professores Ativos</p>
            <div style="font-weight: bolder"></div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas">
            <p><i class="fa fa-user"></i> Qtde. Interessados (visitas)</p>
            <div style="font-weight: bolder"></div>
        </div>
    </div>
    {{-- <div class="box-home" style="margin-top: 2rem; margin-bottom: 2rem">
        <div class="col-xs-6 col-sm-3 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-money"></i> Contas a Pagar</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-3 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-money"></i> Contas a Receber</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-3 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-money"></i> Saldo Geral</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-3 receitas">
            <p><i class="fa fa-user"></i> Atrasados</p>
            <div style="font-weight: bolder">oi</div>
        </div>
    </div> --}}
    <div class="clearfix"></div>
    @piechart('AlunosIdade', 'chart-div1')
    @piechart('AlunosSexo', 'chart-div2')
    @piechart('pagamento', 'chart-div3')
    <div class="row" style="margin-top: 4rem">
        <div class="clearfix"></div>
        <div class="col-xs-12 col-sm-4 box-home" style=" border-radius: 10px;">
            <div
                style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px; box-shadow: 2px 2px 10px #cccccc">
                <div id="chart-div1" style="padding: 10px"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 box-home" style=" border-radius: 10px;">
            <div
                style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px; box-shadow: 2px 2px 10px #cccccc">
                <div id="chart-div2" style="padding: 10px"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 box-home" style=" border-radius: 10px;">
            <div
                style="background-color: white; height: 100%; width: 100%; padding: 3rem; border-radius: 10px; box-shadow: 2px 2px 10px #cccccc">
                <div id="chart-div3" style="padding: 10px"></div>
            </div>
        </div>
    </div>
    <div class="row box-home" style="margin-top: 2rem;">
        <div class="col-xs-12 col-sm-12" style=" border-radius: 10px;">
            <div style="padding:2rem; height: 300px;background-color: white;">
                <div class="table-responsive">
                    <table class="table display datatable-list" style="box-shadow: 2px 2px 10px #cccccc">
                        <thead>
                            <tr>
                                <th>Vendedor</th>
                                <th>Qtde Matrículas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendedores as $vendedor)
                            <tr>
                                <td>{!! $vendedor->Vendedor !!}</td>
                                <td>{!! $vendedor->count !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
