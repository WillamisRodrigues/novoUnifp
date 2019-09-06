@extends('layouts.app')
@section('title', 'Usuário - Editar')

@section('content')
    <section class="content-header">
            <h1 class="pull-right">
                    <ol class="breadcrumb breadcrumb-fp">
                        <li><a href="/home"><i class="fa fa-home"></i></a></li>
                        <li><a href="{!! route('usuarios.index') !!}">Usuários</a></li>
                        <li class="active">Editar Usuário</li>
                    </ol>
                </h1>
                <h1>
                    Editar Usuário
                </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary criar-unidade">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usuario, ['route' => ['usuarios.update', $usuario->id], 'method' => 'patch']) !!}

                        @include('usuarios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
