@extends('layouts.app')

@section('title', 'Formas de Parcelamento')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Formas de Parcelamento</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('formasPagamentos.index') !!}">Forma de Parcelamento</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            @include('formas_pagamentos.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
