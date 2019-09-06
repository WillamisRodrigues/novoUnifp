@extends('layouts.app')

@section('title', 'Formas de Pagamento - Adicionar')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Formas de Pagamento</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('formaPgtos.index') !!}">Formas de Pagamento</a></li>
            <li class="active">Adicionar</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'formaPgtos.store']) !!}

                @include('forma_pgtos.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
