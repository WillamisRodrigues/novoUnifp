@extends('layouts.app')

@section('title', 'Aniversário de Funcionários')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Aniversário de Funcionários</h1>
        <h1 class="pull-right">
            <ol class="breadcrumb breadcrumb-fp">
                <li><a href="/home"><i class="fa fa-home"></i></a></li>
                <li class="active">Aniversário de Funcionários</li>
            </ol>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                    @include('aniversarios.listaFuncionarios')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

