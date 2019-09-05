<div class="container formulario-padrao">
    <!-- Campo Qtde de Parcelas -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('QtdeParcelas', 'Quantidade de Parcelas:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! $formasPagamento->QtdeParcelas !!}</p>
    </div>

    <!-- Campo Bruto Total -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('BrutoTotal', 'Valor Bruto Total:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! number_format($formasPagamento->BrutoTotal, 2, ',', '.') !!}</p>
    </div>

    <!-- Campo Parcela Bruta -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('ParcelaBruta', 'Valor Bruto Parcela:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! number_format($formasPagamento->ParcelaBruta, 2, ',', '.') !!}</p>
    </div>

    <!-- Campo Desconto de Pontualidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DescontoPontualidade', 'Desconto de Pontualidade:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! number_format($formasPagamento->DescontoPontualidade, 2, ',', '.') !!}</p>
    </div>

    <!-- Campo Parcela com desconto de Pontualidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('ParcelaDescontoPontualidade', 'Parcela com Desconto:') !!}
        </p>
        <p class="col-sm-12 col-md-6">{!! number_format($formasPagamento->ParcelaDescontoPontualidade, 2, ',', '.') !!}</p>
    </div>

    <!-- Campo Valor total com desconto de pontualidade -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('ValorTotalDesconto', 'Valor Total com Desconto:') !!}</p>
        <p class="col-sm-12 col-md-6">{!! number_format($formasPagamento->ValorTotalDesconto, 2, ',', '.') !!}</p>
    </div>
</div>
