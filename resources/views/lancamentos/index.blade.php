@extends('layouts.app')

@section('title', 'Lançamentos')

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
                <div style="display: inline-block" class="select-padrao">
                    {{-- {!! Form::select('Mes', ['Janeiro', 'Fevereiro', 'Março', 'Abril','Maio','Junho','Julho','Agosto','Setembro', 'Outubro', 'Novembro', 'Dezembro'], 'Selecione o mês') !!} --}}
                    <select name="Mes" id="Mes">
                        <option value="">Escolha o mês</option>
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
            </div>

            <div style=" margin-left: 3rem">
                Ano: {{-- {!! Form::select('Ano', ['2017','2018','2019'], 'Selecione o ano') !!} --}}
                <div class="select-padrao">
                    <select name="Ano" id="Ano">
                        <option value="">Escolha o ano</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
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
                        <option value="">Escolha um Usuário</option>
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
                        <option value="">Escolha um Centro de Custo</option>
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
            <div class="text-success" style="font-weight: bolder;">R$ {!! number_format($receitasMes, 2, ',', '.') !!}
            </div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Despesas desse Mês</div>
            <div class="text-danger" style="font-weight: bolder;">(R$ {!! number_format($depesasMes, 2, ',', '.') !!})
            </div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Saldo Anterior</div>
            <div style="font-weight: bolder;">Valor</div>
        </div>
        <div class="receitas" style="border-right: 1px solid #44444444">
            <div><i class="fa fa-money"></i> Saldo desse Mês</div>
            <div class="text-primary" style="font-weight: bolder;">R$ {!! number_format($saldoMes, 2, ',', '.') !!}
            </div>
        </div>
        <div class="receitas">
            <div><i class="fa fa-money"></i> Saldo Atual</div>
            <div class="text-primary" style="font-weight: bolder">R$ {!! number_format($saldoAtual, 2, ',', '.') !!}
            </div>
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
