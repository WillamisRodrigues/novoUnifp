@extends('layouts.app')

@section('title', 'Relatório Geral de Recebimentos')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Relatório Geral de Recebimentos</h1>
</section>
<div class="content">
    <div class="clearfix"></div>

        <button type="submit" style="margin-left:30% ;margin-top: 1rem" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Exportar</button>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary" style="width: 40%; margin: 3rem auto;">
        <div class="box-body">
            <div class="table-responsive" style="padding: 4rem">
                <table class="table display datatable-list" id="alunos-table">
                    <thead>
                        <tr>
                            <th>Quantidade de Recebimentos</th>
                            <th>Valor Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1000</td>
                            <td>R$10.000,00</td>
                            <td><p class="bg-vermelho-redondo">Vencido</p></td>
                        </tr>
                        <tr>
                            <td>1000</td>
                            <td>R$10.000,00</td>
                            <td><p class="bg-vermelho-redondo" style="background-color: #00A65A">Aberto</p></td>
                        </tr>
                        <tr>
                            <td>1000</td>
                            <td>R$10.000,00</td>
                            <td><p class="bg-vermelho-redondo" style="background-color: #777777">Quitado</p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="text-center">

    </div>
</div>
@endsection
