<div class="container formulario-padrao">
    <!-- Qtdeparcelas Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('QtdeParcelas', 'Quantidade de Parcelas:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('QtdeParcelas', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Brutototal Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('BrutoTotal', 'Valor Bruto Total:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('BrutoTotal', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Parcelabruta Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ParcelaBruta', 'Valor Bruto Parcela:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('ParcelaBruta', null, ['class' => 'form-control']) !!}</p>
    </div>

    <!-- Descontopontualidade Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('DescontoPontualidade', 'Desconto de Pontualidade:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('DescontoPontualidade', null, ['class' => 'form-control']) !!}
        </p>
    </div>

    <!-- Parceladescontopontualidade Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ParcelaDescontoPontualidade', 'Parcela com Desconto:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-sm-12 col-md-6">{!! Form::number('ParcelaDescontoPontualidade', null, ['class' => 'form-control'])
            !!}
        </p>
    </div>

    <!-- Valortotaldesconto Field -->
    <div class="row">
        <p class="col-sm-12 col-md-4">{!! Form::label('ValorTotalDesconto', 'Valor Total com Desconto:') !!}<span style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6">{!! Form::number('ValorTotalDesconto', null, ['class' => 'form-control']) !!}</p>
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