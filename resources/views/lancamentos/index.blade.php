@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Lançamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('lancamentos.index') !!}">Lançamentos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success" style="margin-left: 1rem" href="{!! route('lancamentos.create') !!}"><i
        class="fa fa-plus"></i> Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="dados" id="formulario-lancamentos">

        {!! Form::open(['url' => 'filtroLancamentos']) !!}
        <div class="ml-5">
            <div>
                <div style="display: inline-block">Mês:</div>
                <div style="display: inline-block">{!! Form::select('Mes', ['Janeiro', 'Fevereiro', 'Março', 'Abril',
                    'Maio', 'Junho',
                    'Julho','Agosto','Setembro', 'Outubro', 'Novembro', 'Dezembro'], 'Selecione o mês') !!}</div>
            </div>

            <div style=" margin-left: 3rem">
                Ano: {!! Form::select('Ano', ['2017','2018','2019'], 'Selecione o ano') !!}
            </div>

            <div style=" margin-left: 3rem" class="row">
                {!! Form::radio('Tipo', 'Sangria', false, [ 'id' => 'Sangria' ]) !!}
                {!! Form::label('Sangria', 'Sangria') !!}
                {!! Form::radio('Tipo', 'Receita', false, [ 'id' => 'Receita', 'style' => 'margin-left:
                1rem' ]) !!}
                {!! Form::label('Receita', 'Receita') !!}
            </div>

            <div style=" margin-left: 5rem">
                <div style="display: inline-block">
                    Caixa:
                </div>
                <div style="display: inline-block">
                    <select name="Usuario" id="Usuario">
                        @foreach ($contaCaixa as $user)
                        <option value="{!! $user->Nome !!}">{!! $user->Nome !!}</option>
                        @endforeach
                    </select> </div>
            </div>

            <div style=" margin-left: 3rem">
                <div style="display: inline-block">
                    Centro de Caixa:
                </div>
                <div style="display: inline-block">
                    <select name="CentroCusto" id="CentroCusto">
                        @foreach ($centroCusto as $cc)
                        <option value="{!! $cc->CentroCusto !!}">{!! $cc->CentroCusto !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left: 0.5rem">
        <button class="btn btn-primary btn-flat" style="margin-bottom:1rem; margin-top: 1rem;" type="submit"><i
                class="fa fa-search"></i> Procurar</button>
        <a href="/lancamentos-avancado" class="btn btn-warning btn-flat"
            style="margin-bottom: 1rem; margin-top:1rem;"><i style=" font-size: 1.5rem" class="fa fa-search-plus"></i>
            Busca Avançada</a>
        {!! Form::close() !!}
    </div>

    <div class="row">
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Receitas desse Mês</div>
            <div class="text-success" style="font-weight: bolder;">{!! 'R$ '.$receitasMes !!}</div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Despesas desse Mês</div>
            <div class="text-danger" style="font-weight: bolder;">({!! 'R$ '.$depesasMes !!})</div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Saldo Anterior</div>
            <div style="font-weight: bolder;">Valor</div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Saldo desse Mês</div>
            <div class="text-primary" style="font-weight: bolder;">{!! 'R$ '.$saldoMes !!}</div>
        </div>
        <div class="receitas">
            <div><i class="fa fa-money"></i> Saldo Atual</div>
            <div class="text-primary" style="font-weight: bolder">{!! 'R$ '.$saldoAtual !!}</div>
        </div>
    </div>

    <div style="margin-top: 4rem">
        <a href="/gerarCsv" target="_blank" class="btn btn-flat btn-success"><i class="fa fa-table"></i> Exportar
            planilha</a>
        <a href="/gerarRelatorio" target="_blank" class="btn btn-flat btn-primary ml-5"><i class="fa fa-file-text"></i>
            Exportar PDF</a>
    </div>

    <div class="box box-primary">
        <div class="box-body">
            @include('lancamentos.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
