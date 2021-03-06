@extends('layouts.app')

@section('title', 'Agenda - Editar Compromisso')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('agendas.index') !!}" class="disabled">Agenda</a></li>
            <li class="active">Editar Compromisso</li>
        </ol>
    </h1>
    <h1>
        Editar Compromisso
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::model($agenda, ['route' => ['agendas.update', $agenda->id], 'method' => 'patch']) !!}

                @include('agendas.fieldsEdit')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
