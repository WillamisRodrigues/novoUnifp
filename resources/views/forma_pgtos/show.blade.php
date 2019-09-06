@extends('layouts.app')

@section('title', 'Formas de Pagamento - Detalhes')

@section('content')
    <section class="content-header">
        <h1>
            Forma Pgto
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('forma_pgtos.show_fields')
                    <a href="{!! route('formaPgtos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
