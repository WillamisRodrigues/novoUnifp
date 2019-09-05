@extends('layouts.app')

@section('title', 'Agenda - Adicionar Compromisso')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('agendas.index') !!}">Agenda</a></li>
            <li class="active">Adicionar Compromisso</li>
        </ol>
    </h1>
    <h1>
        Adicionar Compromisso
    </h1>
</section>
<div class="content content-agenda-pessoal">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                {!! Form::open(['route' => 'agendas.store']) !!}

                @include('agendas.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
