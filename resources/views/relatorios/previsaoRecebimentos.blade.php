@extends('layouts.app')

@section('title', 'Previsão de Recebimentos')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Previsão de Recebimentos</h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    <div class="container" style="margin-top: 1rem">
        <div class="row select-padrao">
            {!! Form::open(['url' => 'filtroRecebimentos']) !!}
            <span class="col-sm-1" style="font-weight: bolder; margin-top: 0.5rem">Ano:</span>
            <select required class="col-sm-1" name="Ano" id="Ano">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
            <div class="col-sm-1"></div>
            <span class="col-sm-1" style="font-weight: bolder; margin-top: 0.5rem">Mês:</span>
            <select class="col-sm-1" name="Mes" id="Mes">
                <option value="">Mês</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i> Filtrar</button>
                {{-- <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Exportar</button> --}}
                <a href="/exportarPrevisao" target="_blank" class="btn btn-flat btn-info" ><i class="fa fa-print"></i> Exportar</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary criar-unidade" >
        <div class="box-body">
            <div class="table-responsive" style="width: 50%; margin: 0 25%">
                <table class="table display " id="alunos-table">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Mês</th>
                            <th>Soma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Janeiro</td>
                            <td>R$ {!! number_format($somaJan, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Fevereiro</td>
                            <td>R$ {!! number_format($somaFev, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Março</td>
                            <td>R$ {!! number_format($somaMar, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Abril</td>
                            <td>R$ {!! number_format($somaAbr, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Maio</td>
                            <td>R$ {!! number_format($somaMai, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Junho</td>
                            <td>R$ {!! number_format($somaJun, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Julho</td>
                            <td>R$ {!! number_format($somaJul, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Agosto</td>
                            <td>R$ {!! number_format($somaAgo, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Setembro</td>
                            <td>R$ {!! number_format($somaSet, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Outubro</td>
                            <td>R$ {!! number_format($somaOut, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Novembro</td>
                            <td>R$ {!! number_format($somaNov, 2, ',', '.') !!}</td>
                        </tr>
                        <tr>
                            <td>{!! date('Y') !!}</td>
                            <td>Dezembro</td>
                            <td>R$ {!! number_format($somaDez, 2, ',', '.') !!}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <td></td>
                        <td></td>
                        <td>Total: R$ {!! number_format($somaJan+$somaFev+$somaMar+$somaAbr+$somaMai+$somaJun+$somaJul+$somaAgo+$somaSet+$somaOut+$somaNov+$somaDez, 2, ',', '.')!!}</td>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
    <div class="text-center">

    </div>
</div>
@endsection
