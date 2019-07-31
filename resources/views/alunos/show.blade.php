@extends('layouts.app')

@section('content')
    <section class="content-header">
            <h1 class="pull-left">Alunos</h1>
            <h1 class="pull-right">
                <ol class="breadcrumb breadcrumb-fp">
                    <li><a href="/home"><i class="fa fa-home"></i></a></li>
                    <li><a href="{!! route('alunos.index') !!}">Alunos</a></li>
                    <li class="active">Detalhes</li>
                </ol>
            </h1>
    </section>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('alunos.show_fields')
                    <div class="col-md-3"></div>
                    <a href="{!! route('alunos.index') !!}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
