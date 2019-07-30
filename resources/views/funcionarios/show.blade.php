@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('funcionarios.index') !!}">Funcionário</a></li>
            <li class="active">Detalhes</li>
        </ol>
    </h1>
    <h1>
        Detalhes do Funcionário
    </h1>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row" style="padding-left: 20px">
                @include('funcionarios.show_fields')
                <a href="{!! route('funcionarios.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
