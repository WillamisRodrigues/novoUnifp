@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Formas de Pagamento</h1>
    <a class="btn btn-success pull-right" style="margin-left: 1rem" href="{!! route('formasPagamentos.create') !!}"><i
            class="fa fa-plus"></i> Adicionar</a>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('formasPagamentos.index') !!}">Forma de Pagamento</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('formas_pagamentos.show_fields')
                <div class="col-md-3"></div>
                <a href="{!! route('formasPagamentos.index') !!}" class="btn btn-default">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection
