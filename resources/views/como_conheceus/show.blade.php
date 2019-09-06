@extends('layouts.app')

@section('title', 'Como Conheceu - Detalhes')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Como Conheceu</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('comoConheceus.index') !!}">Como Conheceu</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('como_conheceus.show_fields')
                <a href="{!! route('comoConheceus.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
