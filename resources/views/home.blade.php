@extends('layouts.app')

@section('content')
<div class="" style="padding: 10px 20px">
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-xs-12 col-sm-6" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Matrícula por Meses</p>
        </div>
        <div class="col-xs-12 col-sm-6" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Receitas e Despesas</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Número de Matrículas por Dia</p>
        </div>
    </div>
    <div class="row" style="margin-top: 1rem">
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Alunos Ativos</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-list"></i> Qtde. Turmas</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Evasão</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-list"></i> Qtde. Cursos</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas" style="border-right: 1px solid #44444444">
            <p><i class="fa fa-user"></i> Qtde. Professores Ativos</p>
            <div style="font-weight: bolder">oi</div>
        </div>
        <div class="col-xs-6 col-sm-2 receitas">
            <p><i class="fa fa-user"></i> Qtde. Interessados (visitas)</p>
            <div style="font-weight: bolder">oi</div>
        </div>
    </div>
    <div class="row" style="margin-top: 2rem">
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
    </div>
    <div class="row" style="margin-top: 2rem;">
        <div class="col-xs-12 col-sm-4" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Alunos por Idade</p>
        </div>
        <div class="col-xs-12 col-sm-4" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Alunos por Sexo</p>
        </div>
        <div class="col-xs-12 col-sm-4" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Média de Alunos das Turmas</p>
        </div>
    </div>
    <div class="row" style="margin-top: 2rem">
        <div class="col-xs-12 col-sm-12" style=" border-radius: 10px;">
            <p style="padding:2rem; height: 300px;background-color: white;"> Número de Matrículas por Vendedor</p>
        </div>
    </div>
</div>
@endsection
