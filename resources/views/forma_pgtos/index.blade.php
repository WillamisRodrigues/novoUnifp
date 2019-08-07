@extends('layouts.app')

@section('content')
    <section class="content-header">
        {{-- <h1 class="pull-left">Formas de Pagamento</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('formaPgtos.create') !!}">Add New</a>
        </h1> --}}

        <h1 class="pull-left">Formas de Pagamento</h1>
        <a class="btn btn-success pull-right" style="margin-left: 1rem" href="{!! route('formaPgtos.create') !!}"><i
                class="fa fa-plus"></i> Adicionar</a>
        <h1 class="pull-right">
            <ol class="breadcrumb breadcrumb-fp">
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li><a href="{!! route('formaPgtos.index') !!}">Formas de Pagamento</a></li>
                <li class="active">Lista</li>
            </ol>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                    @include('forma_pgtos.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

