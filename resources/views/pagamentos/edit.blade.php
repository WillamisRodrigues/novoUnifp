@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Pagamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('alunos.index') !!}">Alunos</a></li>
            <li><a href="{!! route('pagamentos.show', [$aluno->id]) !!}">Pagamentos</a></li>
            <li class="active">Lançar pagamento</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body formulario-padrao">
            {!! Form::open(['route' => 'pagamentos.store']) !!}
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Nº Documento:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! str_pad($recibo->numeroDocumento, 8, '0', STR_PAD_LEFT) !!}
                    {!! Form::hidden('numeroDocumento', $recibo->numeroDocumento) !!}
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Aluno:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! str_pad($aluno->id, 8, '0', STR_PAD_LEFT) !!}, {!! $aluno->Nome !!}
                    {!! Form::hidden('Matricula', $aluno->id) !!}
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Parcela:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! $recibo->Parcela !!}
                    {!! Form::hidden('Parcela', $recibo->Parcela) !!}
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Referente:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! $recibo->Referencia !!}
                    {!! Form::hidden('Referencia', $recibo->Referencia) !!}
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Vencimento:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! date('d/m/Y', strtotime($recibo->Vencimento)); !!}
                    {!! Form::hidden('Vencimento', $recibo->Vencimento) !!}
                </div>
            </p>
            {!! Form::hidden('Usuario', Auth::user()->name) !!}
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Status:</div>
                <div class="col-md-6 col-sm-6 col-xs-12 row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" name="Status" id="Status" value="Aberto">
                        <label style="border-radius: 100px; color: white; padding: 2px 4px; background-color: #00a65b"
                            for="Status">Aberto</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" name="Status" id="Quitado" value="Quitado">
                        <label style="border-radius: 100px; color: white; padding: 2px 4px; background-color: #333333"
                            for="Quitado">Quitado</label>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="radio" name="Status" id="Vencido" value="Vencido">
                        <label style="border-radius: 100px; color: white; padding: 2px 4px; background-color: #CC403C"
                            for="Vencido">Vencido</label>
                    </div>
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Forma:</div>
                <div class="col-md-6 col-sm-6 col-xs-12 select-padrao">
                    <select name="FormaPagamento" id="FormaPagamento" style="width: 50%">
                        @foreach($formaPgtos as $formaPgto )
                        <option value="{{ $formaPgto->FormaPagamento }}">{{ $formaPgto->FormaPagamento }}</option>
                        @endforeach
                    </select>
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Multa:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('Multa', null) !!}
                </div>
            </p>
            <p class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="font-weight:bold">Valor:</div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::text('Valor', null) !!}
                </div>
            </p>
            <div class="form-group col-sm-12" style="margin-top: 15px">
                <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i
                        class="fa fa-save"></i>
                    Lançar</button>
                <a href="{!! route('pagamentos.show', [$aluno->id]) !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat">
                    <i class="fa fa-close"></i> Cancelar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
