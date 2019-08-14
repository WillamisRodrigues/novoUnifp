@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('fornecedors.index') !!}">Fornecedores</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
    <h1>
        Adicionar Fornecedores
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'fornecedors.store']) !!}

                @include('fornecedors.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
