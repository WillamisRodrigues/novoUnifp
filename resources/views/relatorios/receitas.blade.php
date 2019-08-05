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
        <p class="select-padrao col-md-2"> Selecione o ano:
            <select name="cursos" id="cursos">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>
        </p>
        <p class="select-padrao col-md-2"> Selecione o mês:
            <select name="turmas" id="turmas">
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Março">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
            </select>
        </p>
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
                            <td>{!! date('Y', strtotime($caixa->Lancamento)); !!}</td>
                            <td>{!! date('M', strtotime($caixa->Lancamento)); !!}</td>
                            <td>{!! $caixa->Via !!}</td>
                            <td>{!! $caixa->ContaCaixa !!}</td>
                            <td>{!! $caixa->CentroCusto !!}</td>
                            <td>R$ {!! $caixa->Valor !!},00</td>
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
