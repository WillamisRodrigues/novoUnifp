@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visitante
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary criar-unidade">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('visitantes.show_fields')
                    <a href="{!! route('visitantes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
