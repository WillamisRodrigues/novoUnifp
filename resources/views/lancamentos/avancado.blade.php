@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Lançamentos</h1>
    <h1 class="pull-right">
        <ol class="breadcrumb breadcrumb-fp">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="{!! route('lancamentos.index') !!}">Lançamentos</a></li>
            <li class="active">Busca Avançada</li>
        </ol>
    </h1>
</section>
<div class="content">
    <div class="box box-primary criar-unidade">
        <div class="box-body">
            <div class="row">
                {!! Form::open(array('url' => 'buscaAvancada')) !!}
                <div class="container formulario-padrao">

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Mes', 'Mês:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            {!! Form::select('Mes', array(
                            '01' => 'Janeiro',
                            '02' => 'Fevereiro',
                            '03' => 'Março',
                            '04' => 'Abril',
                            '05' => 'Maio',
                            '06' => 'Junho',
                            '07' => 'Julho',
                            '08' => 'Agosto',
                            '09' => 'Setembro',
                            '10' => 'Outubro',
                            '11' => 'Novembro',
                            '12' => 'Dezembro',
                            ), ['class' => 'custom-select']) !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Ano', 'Ano:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            {!! Form::select('Ano', array(
                            '2017' => '2017',
                            '2018' => '2018',
                            '2019' => '2019',
                            ), ['class' => 'custom-select']) !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Tipo', 'Tipo:') !!}</p>
                        <p class="col-sm-12 col-md-6">
                            {!! Form::radio('Tipo', 'Sangria', false, [ 'id' => 'Sangria' ]) !!}
                            {!! Form::label('Sangria', 'Sangria') !!}
                            {!! Form::radio('Tipo', 'Receita', false, [ 'id' => 'Receita', 'style' => 'margin-left:
                            1rem' ]) !!}
                            {!! Form::label('Receita', 'Receita') !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Forma', 'Forma:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            <select name="Forma" id="Forma">
                                @foreach ($formas as $forma)
                                <option value="{{ $forma->FormaPagamento }}">{{ $forma->FormaPagamento }}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Situacao', 'Situação:') !!}</p>
                        <p class="col-sm-12 col-md-8">
                            {!! Form::radio('Situacao', 'Pago', false, [ 'id' => 'Pago' ]) !!}
                            {!! Form::label('Pago', 'Pago', ['class' => 'bg-vermelho-redondo', 'style' =>
                            'background-color: #777777; padding: 5px 10px']) !!}
                            {!! Form::radio('Situacao', 'Pagar', false, [ 'id' => 'Pagar', 'style' => 'margin-left:1rem'
                            ]) !!}
                            {!! Form::label('Pagar', 'A pagar', ['class' => 'bg-vermelho-redondo', 'style' => 'padding:
                            5px 10px']) !!}
                            {!! Form::radio('Situacao', 'Recebido', false, [ 'id' => 'Recebido', 'style' =>
                            'margin-left:1rem' ]) !!}
                            {!! Form::label('Recebido', 'Recebido', ['class' => 'bg-vermelho-redondo', 'style' =>
                            'background-color: #3FC0EF; padding: 5px 10px']) !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Descricao', 'Descrição:') !!}</p>
                        <p class="col-sm-12 col-md-6">
                            {!! Form::text('Descricao', null, ['class' => 'form-control']) !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Aluno', 'Aluno:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            <select name="Aluno" id="Aluno">
                                @foreach ($alunos as $aluno)
                                <option value="{!! $aluno->Nome !!}">{!! $aluno->Nome !!}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Valor', 'Valor:') !!}</p>
                        <p class="col-sm-12 col-md-6">
                            {!! Form::text('Valor', null, ['class' => 'form-control']) !!}
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('VencimentoInicio', 'Data de Vencimento:') !!}
                            <small style="font-size: 1rem; float: right; margin-top: 10px">De</small> </p>
                        <div class="input-group col-md-6 col-sm-12" style="padding: 0 15px">
                            {!! Form::date('VencimentoInicio', null, ['class' => 'form-control','id'=>'datepicker'])!!}
                            <div class="input-group-addon agenda-input-hora">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4"><small
                                style="font-size: 1rem; float: right; margin-top: 10px">até</small></p>
                        <div class="input-group col-md-6 col-sm-12" style="padding: 0 15px">
                            {!! Form::date('VencimentoFim', null, ['class' => 'form-control','id'=>'datepicker'])!!}
                            <div class="input-group-addon agenda-input-hora">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('LancamentoInicio', 'Data de Lançamento:') !!}
                            <small style="font-size: 1rem; float: right; margin-top: 10px">De</small> </p>
                        <div class="input-group col-md-6 col-sm-12" style="padding: 0 15px">
                            {!! Form::date('LancamentoInicio', null, ['class' => 'form-control','id'=>'datepicker'])!!}
                            <div class="input-group-addon agenda-input-hora">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4"><small
                                style="font-size: 1rem; float: right; margin-top: 10px">até</small></p>
                        <div class="input-group col-md-6 col-sm-12" style="padding: 0 15px">
                            {!! Form::date('LancamentoFim', null, ['class' => 'form-control','id'=>'datepicker'])!!}
                            <div class="input-group-addon agenda-input-hora">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1rem">
                        <p class="col-sm-12 col-md-4">{!! Form::label('CentroCusto', 'Centro Custo:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            <select name="CentroCusto" id="CentroCusto">
                                @foreach ($centroCusto as $cc)
                                <option value="{!! $cc->CentroCusto !!}">{!! $cc->CentroCusto !!}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    <div class="row">
                        <p class="col-sm-12 col-md-4">{!! Form::label('Usuario', 'Usuário:') !!}</p>
                        <p class="col-sm-12 col-md-6 select-padrao">
                            <select name="Usuario" id="Usuario">
                                @foreach ($contaCaixa as $user)
                                <option value="{!! $user->Nome !!}">{!! $user->Nome !!}</option>
                                @endforeach
                            </select>
                        </p>
                    </div>

                    @section('scripts')
                    <script src="{{ url('js/datepicker.js') }}"></script>
                    <script src="{{ url('js/timepicker.js') }}"></script>
                    <script>
                        //Timepicker
                        $('.timepicker').timepicker({
                            showInputs: false,
                            timeFormat: 'HH:mm:ss'
                        })
                    </script>
                    @endsection

                    <div class="row">
                        <div class="col-md-4"></div>
                        <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i
                                class="fa fa-search"> </i> Pesquisar</button>
                        <button class="btn btn-danger btn-flat" style="margin-bottom:1rem" type="reset"> <i
                                class="fa fa-close"> </i> Limpar</button>
                    </div>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
