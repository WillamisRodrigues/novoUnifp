@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Lançamentos</h1>
    <a class="btn btn-success pull-right" style="margin-left: 1rem" href="{!! route('lancamentos.create') !!}"><i
            class="fa fa-plus"></i> Adicionar</a>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('lancamentos.index') !!}">Lançamentos</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>

@endsection
