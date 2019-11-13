@extends('layouts.app')

@section('title', 'Fornecedores - Editar')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('fornecedores.index') !!}">Fornecedores</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
    <h1>
        Editar Fornecedores
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($fornecedor, ['route' => ['fornecedores.update', $fornecedor->id], 'method' => 'patch'])
                !!}

                @include('fornecedores.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
