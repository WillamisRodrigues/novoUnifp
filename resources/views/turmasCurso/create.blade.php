@extends('layouts.app')

@section('title', 'Turmas por Curso - Adicionar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Turmas Ativas</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('turmas.index') !!}">Turmas Ativas</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'turmas.store']) !!}

                @include('turmas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
