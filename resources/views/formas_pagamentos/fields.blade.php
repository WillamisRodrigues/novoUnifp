<div class="container formulario-padrao">
    <!-- Qtdeparcelas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('QtdeParcelas', 'Quantidade de Parcelas:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::text('QtdeParcelas', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Brutototal Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('BrutoTotal', 'Valor Bruto Total:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-sm-12 col-md-6">
        </p> --}}
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('BrutoTotal', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Parcelabruta Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ParcelaBruta', 'Valor Bruto Parcela:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-sm-12 col-md-6">
        </p> --}}
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('ParcelaBruta', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Descontopontualidade Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DescontoPontualidade', 'Desconto de Pontualidade:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-sm-12 col-md-6">
        </p> --}}
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('DescontoPontualidade', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Parceladescontopontualidade Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ParcelaDescontoPontualidade', 'Parcela com Desconto:') !!}<span
                style="color: red">*</span>
        </p>
        {{-- <p class="col-sm-12 col-md-6">
        </p> --}}
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('ParcelaDescontoPontualidade', null, ['class' => 'form-control'])!!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Valortotaldesconto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ValorTotalDesconto', 'Valor Total com Desconto:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-sm-12 col-md-6">
        </p> --}}
        <div class="col-sm-12 col-md-6 input-group"
            style="padding-right: 15px; padding-left: 15px; margin-bottom: 10px;">
            {!! Form::text('ValorTotalDesconto', null, ['class' => 'form-control']) !!}
            <div class="input-group-addon">
                <i class="glyphicon glyphicon-usd"></i>
            </div>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4"></p>
        <p class="col-sm-12 col-md-6">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i>
                Salvar
                Forma de Pagamento</button>
            <a href="{!! route('formasPagamentos.index') !!}" style="margin-bottom: 1rem"
                class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </p>
    </div>
</div>
