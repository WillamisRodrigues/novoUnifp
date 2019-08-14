@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('agendas.index') !!}">Agenda</a></li>
            <li class="active">Detalhes Compromisso</li>
        </ol>
    </h1>
    <h1>
        Detalhes Compromisso
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 30px">
                @include('agendas.show_fields')
                <p class="col-sm-12 col-md-3"></p>
                <p class="col-sm-12 col-md-9"><a href="{!! route('agendas.index') !!}" class="btn btn-default">Voltar</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
