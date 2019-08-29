@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Pagamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('alunos.index') !!}">Aluno</a></li>
            <li><a href="{!! route('pagamentos.index') !!}">Pagamentos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="container" style="height: 100px">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fa fa-graduation-cap"></i> Informações do aluno</div>
                <div class="panel-body row">
                    @foreach ($alunos as $aluno)
                    <p class="col-md-6 col-sm-12"><strong>Matrícula</strong>: {!! $aluno->id !!}</p>
                    <p class="col-md-6 col-sm-12"><strong>Nome</strong>: {!! $aluno->Nome !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="table-responsive">
                @foreach($alunos as $aluno)
                <table class="table display datatable-list">
                    <thead>
                        <tr>
                            <th>Nº Documento</th>
                            <th>Parcela</th>
                            <th>Referente</th>
                            <th>Vencimento</th>
                            <th>Status</th>
                            <th>Forma</th>
                            <th>Data do Pagamento</th>
                            <th>Multa</th>
                            <th>Valor</th>
                            <th>Recibo</th>
                            <th>Usuário</th>
                            <th>Data/Hora</th>
                            <th>Lançamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagtos as $pagto)
                        <tr>
                            <td>{!! $pagto->numeroDocumento !!}</td>
                            <td>{!! $pagto->Parcela !!}</td>
                            <td>{!! $pagto->Referencia !!}</td>
                            <td>
                                {!! date('d/m/Y', strtotime($pagto->Vencimento)); !!}
                            </td>
                            <td class="text-center">
                                @php
                                date_default_timezone_set('America/Sao_Paulo');
                                $date = date('Y-m-d H:i:s');
                                if($pagto->Vencimento > $date || $pagto->Status == "Quitado"){
                                    if($pagto->Status == "Quitado"){
                                        echo " <span
                                            style='border-radius: 100px; padding: 0.5rem 1rem; font-weight:bold; border: 2px solid #2BA65A; color: #2BA65A'>
                                            Quitado </span>";
                                    } else {
                                        echo " <span
                                            style='border-radius: 100px; padding: 0.5rem 1rem; font-weight:bold; border: 2px solid #3C8DBC; color: #3C8DBC'>
                                            Aberto </span>";
                                    }
                                } else {
                                    echo " <span
                                        style='border-radius: 100px; padding: 0.5rem 1rem; font-weight:bold; border: 2px solid #DD4B39; color: #DD4B39'>
                                        Vencido </span>";
                                }
                                @endphp
                            </td>
                            <td>{!! $pagto->Forma !!}</td>
                            <td>
                                @if($pagto->DataPgto != null)
                                {!! date('d/m/Y', strtotime($pagto->DataPgto)); !!}
                                @endif
                            </td>
                            <td>{!! $pagto->Multa !!}</td>
                            <td>{!! $pagto->Valor !!}</td>
                            <td>
                                @if($pagto->DataPgto != null)
                                <a href="/gerarRecibo/{!! $pagto->numeroDocumento !!}/{!! $aluno->id !!}"
                                    target="_blank" class="btn btn-flat btn-primary"><i class="fa fa-bars"></i>
                                    Recibo</a>
                                @endif
                            </td>
                            <td>{!! $pagto->Usuario !!}</td>
                            <td>
                                @if($pagto->Data != null)
                                {!! date('H:i:s d/m/Y', strtotime($pagto->Data)) !!}
                                @endif
                            </td>
                            <td>
                                @if($pagto->Data == null)
                                <a href="/pagamentos/lancar/{!! $pagto->numeroDocumento !!}/{!! $aluno->id !!}"
                                    class="btn btn-flat btn-primary"><i class="fa fa-bars"></i> Lançar</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
                <div class="row">
                    <a href="{!! route('alunos.index') !!}" class="btn btn-default" style="margin-left: 10rem; border: 1px solid #444">Voltar</a>
                </div>
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
