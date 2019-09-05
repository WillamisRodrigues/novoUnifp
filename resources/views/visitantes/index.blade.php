@extends('layouts.app')

@section('title', 'Visitantes')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Visitantes</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('visitantes.index') !!}">Visitantes</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="clearfix"></div>
<a class="btn btn-success" style="margin-left: 1rem" href="{!! route('visitantes.create') !!}"><i
        class="fa fa-plus"></i> Adicionar</a>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary ">
        <div class="box-body">
            @include('visitantes.table')
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
