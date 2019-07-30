@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visitante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($visitante, ['route' => ['visitantes.update', $visitante->id], 'method' => 'patch']) !!}

                        @include('visitantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
