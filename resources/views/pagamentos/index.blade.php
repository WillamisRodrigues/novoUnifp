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
                            <td>{!! $pagto->Status !!}</td>
                            <td>{!! $pagto->Forma !!}</td>
                            <td>
                                @if($pagto->DataPgto != null)
                                    {!! date('d/m/Y', strtotime($pagto->DataPgto)); !!}
                                @endif
                            </td>
                            <td>{!! $pagto->Multa !!}</td>
                            <td>{!! $pagto->Valor !!}</td>
                            <td><a href="#" class="btn btn-flat btn-primary"><i class="fa fa-bars"></i> Recibo</a></td>
                            <td>{!! $pagto->Usuario !!}</td>
                            <td>
                                @if($pagto->Data != null)
                                    {!! date('h:i:s d/m/Y', strtotime($pagto->Data)) !!}
                                @endif
                            </td>
                            <td><a href="/pagamentos/lancar/{!! $pagto->numeroDocumento !!}/{!! $aluno->id !!}" class="btn btn-flat btn-primary"><i class="fa fa-bars"></i> Lançar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>

        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
