@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Relatório de Receitas</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('caixas.index') !!}">Relatório de Receitas</a></li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="row" style="margin-left: 5rem">
        {!! Form::open(['route' => 'filtroReceitas']) !!}
        <p class="select-padrao col-md-2"> Selecione o ano:
            <select name="ano" id="ano">
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
            </select>
        </p>
        <p class="select-padrao col-md-2"> Selecione o mês:
            <select name="mes" id="mes">
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
        </p>
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Filtrar</button>
        {!! Form::close() !!}
    </div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table datatable-list" id="caixas-table">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Mês</th>
                            <th>Tipo</th>
                            <th>Conta Caixa</th>
                            <th>Centro Custo</th>
                            <th>Valor</th>
                            <th>Usuário</th>
                            <th>Data/Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($caixas as $caixa)
                        <tr>
                            <td>{!! date('Y', strtotime($caixa->created_at)); !!}</td>
                            <td>
                                {{-- {!! date('M', strtotime($caixa->Lancamento)); !!} --}}
                                @switch(date('M', strtotime($caixa->created_at)))
                                    @case('Jan')
                                        {!! 'Janeiro' !!}
                                        @break
                                    @case('Feb')
                                        {!! 'Fevereiro' !!}
                                        @break
                                    @case('Mar')
                                        {!! 'Março' !!}
                                        @break
                                    @case('Apr')
                                        {!! 'Abril' !!}
                                        @break
                                    @case('May')
                                        {!! 'Maio' !!}
                                        @break
                                    @case('Jun')
                                        {!! 'Junho' !!}
                                        @break
                                    @case('Jul')
                                        {!! 'Julho' !!}
                                        @break
                                    @case('Aug')
                                        {!! 'Agosto' !!}
                                        @break
                                    @case('Sep')
                                        {!! 'Setembro' !!}
                                        @break
                                    @case('Oct')
                                        {!! 'Outubro' !!}
                                        @break
                                    @case('Nov')
                                        {!! 'Novembro' !!}
                                        @break
                                    @case('Dec')
                                        {!! 'Dezembro' !!}
                                        @break
                                    @default
                                        {!! 'Não encontrado' !!}

                                @endswitch
                            </td>
                            <td>{!! $caixa->Via !!}</td>
                            <td>{!! $caixa->ContaCaixa !!}</td>
                            <td>{!! $caixa->CentroCusto !!}</td>
                            <td>R$ {!! $caixa->Valor !!}</td>
                            <td>{!! $caixa->Usuario !!}</td>
                            <td>
                                {!! date('H:m:s d/m/Y', strtotime($caixa->Data)); !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{!! $sum !!}</td>
                        <td></td>
                        <td></td>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
