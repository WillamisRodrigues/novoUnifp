@extends('layouts.app')

@section('title', 'Turmas Inativas')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Turmas Inativas</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('turmasInativas.index') !!}">Turmas Inativas</a></li>
            <li class="active">Lista</li>
        </ol>
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'turmas.store']) !!}

                @include('turmasInativas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
