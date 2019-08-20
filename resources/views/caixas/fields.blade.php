@section('scripts')
<script src="{{ url('js/datepicker.js') }}"></script>
<script src="{{ url('js/timepicker.js') }}"></script>
@endsection
<div class="container formulario-padrao">
    <!-- Tipo Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Tipo', 'Tipo:') !!}</p>
        <p class="col-sm-12 col-md-6">
            <label>{!! Form::radio('Tipo', 'Sangria', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Sangria </span>
            </label>
        </p>
    </div>

    <!-- Via Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Via', 'Via:') !!}</p>
        <p class="col-sm-12 col-md-6">
            {{-- {!! Form::text('Via', null, ['class' => 'form-control']) !!} --}}
            <label>{!! Form::radio('Via', 'Caixa', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Caixa </span>
            </label>
        </p>
    </div>

    <!-- Formapgto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('FormaPgto', 'Forma de pagamento:') !!}</p>
        <p class="col-sm-12 col-md-6 select-padrao">
            <select name="FormaPgto" id="FormaPgto">
                @foreach ($formapgtos as $formapgto)
                <option value="{!! $formapgto->FormaPagamento !!}">
                    {!! $formapgto->FormaPagamento !!}
                </option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Status Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Status', 'Status:') !!}</p>
        <p class="col-sm-12 col-md-6">
            {{-- {!! Form::text('Status', null, ['class' => 'form-control']) !!} --}}
            <label>{!! Form::radio('Status', 'Pago', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="background-color: black"> Pago </span>
            </label>
            <label>{!! Form::radio('Status', 'FaltaPagar', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style=" background-color: #D73925"> Aguardando
                    Pagamento </span>
            </label>
        </p>
    </div>

    <!-- Descricao Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Descricao', 'Descrição:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::textarea('Descricao', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Aluno Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Aluno', 'Aluno:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! Form::text('Aluno', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Lancamento Field -->
    <input type="hidden" name="Lancamento" id="Lancamento" value="{!!  date(" Y-m-d H:m:s") !!}">

    <!-- Data Field -->
    <input type="hidden" name="Data" id="Data" value="{!!  date(" Y-m-d H:m:s") !!}">

    <!-- Vencimento Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Vencimento', 'Data de Vencimento:') !!}</p>
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::date('Vencimento', null, ['class' => 'form-control', 'id' =>
            'Vencimento'])!!}
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Valor Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('Valor', 'Valor:') !!}</p>
        <div class="col-sm-12 col-md-6 input-group" style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('Valor', null, ['class' => 'form-control', 'id' => 'Valor'])!!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Centrocusto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('CentroCusto', 'Centro de Custo:') !!}</p>
        <p class="col-sm-12 col-md-6 select-padrao">
            <select name="CentroCusto" id="CentroCusto">
                @foreach ($centroCustos as $centroDeCusto)
                <option value="{!! $centroDeCusto->CentroCusto !!}">
                    {!! $centroDeCusto->CentroCusto !!}
                </option>
                @endforeach
            </select>
        </p>
    </div>

    <!-- Contacaixa Field -->
    <input type="hidden" name="ContaCaixa" id="ContaCaixa" value="{{ Auth::user()->name }}">

    <!-- Usuario Field -->
    <input type="hidden" name="Usuario" id="Usuario" value="{{ Auth::user()->name }}">


    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
                Salvar Caixa</button>
            <a href="{!! route('caixas.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </div>
    </div>
</div>
