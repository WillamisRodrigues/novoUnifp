@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Previsão de Recebimentos</h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    <div class="container" style="margin-top: 1rem">
        <div class="row select-padrao">
            <span class="col-sm-1" style="font-weight: bolder; margin-top: 0.5rem">Ano:</span>
            <select class="col-sm-1" name="Ano" id="Ano">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
            </select>
            <div class="col-sm-1"></div>
            <span class="col-sm-1" style="font-weight: bolder; margin-top: 0.5rem">Mês:</span>
            <select class="col-sm-1" name="Mes" id="Mes">
                <option value="Janeiro">Janeiro</option>
                <option value="Fevereiro">Fevereiro</option>
                <option value="Marco">Março</option>
                <option value="Abril">Abril</option>
                <option value="Maio">Maio</option>
                <option value="Junho">Junho</option>
                <option value="Julho">Julho</option>
                <option value="Agosto">Agosto</option>
                <option value="Setembro">Setembro</option>
                <option value="Outubro">Outubro</option>
                <option value="Novembro">Novembro</option>
                <option value="Dezembro">Dezembro</option>
            </select>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i> Filtrar</button>
                <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Exportar</button>
            </div>
        </div>
    </div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table display datatable-list" id="alunos-table">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Mês</th>
                            <th>Soma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2019</td>
                            <td>Janeiro</td>
                            <td>R$ 10,00</td>
                        </tr>
                        <tr>
                            <td>2019</td>
                            <td>Fevereiro</td>
                            <td>R$ 10,00</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td>Total: R$10,00</td>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
    <div class="text-center">

    </div>
</div>
@endsection
