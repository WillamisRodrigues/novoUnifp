@extends('layouts.app')

@section('title', 'Nível de Acesso - Editar')

@section('css')
<style>
    tr {
        border-bottom: 2px solid #33333333
    }

    thead {
        font-weight: bolder
    }
</style>
@endsection

@section('content')
<section class="content-header">
    <h1 class="pull-left">Editar Perfil</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('nivelAcessos.index') !!}">Perfil de Acesso</a></li>
            <li class="active">Editar</li>
        </ol>
    </h1>
    <div class="clearfix"></div>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            {!! Form::open(['url' => 'atualizarPermissoes']) !!}
            <button type="submit" class="btn btn-success pull-right"> <i class="fas fa-sync-alt"></i> Atualizar Permissões </button>
            <a href="{!! route('nivelAcessos.index') !!}"  style="margin-right: 5px" class="btn btn-default pull-right">Voltar</a>
            <table class="table display text-center">
                <thead>
                    <tr>
                        <td>Nome permissão</td>
                        <td>Listar</td>
                        <td>Editar</td>
                        <td>Deletar</td>
                        <td>Criar</td>
                    </tr>
                </thead>
                <input type="hidden" name="permissao" value="{!! $nivelAcesso->id !!}">
                <tbody>
                    @foreach ($resources as $resource)
                    <tr>
                        <td>{!! $resource->resource !!} </td>
                        @foreach ($permissoes as $permissao)
                        @if ($permissao->resource == $resource->resource)
                        <td>
                            @if ($permissoes_concedidas->contains('permission_id', $permissao->id))
                            <input type="checkbox" name="{!! $permissao->id !!}" id="{!! $permissao->name  !!}" checked>
                            @else
                            <input type="checkbox" name="{!! $permissao->id !!}" id="{!! $permissao->name !!}">
                            @endif
                        </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success pull-right"> <i class="fas fa-sync-alt"></i> Atualizar Permissões </button>
            <a href="{!! route('nivelAcessos.index') !!}"  style="margin-right: 5px" class="btn btn-default pull-right">Voltar</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
