<div class="table-responsive">
    <table class="table display datatable-list" id="formasPagamentos-table">
        <thead>
            <tr>
                <th>Quantidade de Parcelas</th>
                <th>Valor Bruto Total</th>
                <th>Parcela Bruta</th>
                <th>Desconto de Pontualidade</th>
                <th>Parcela com Desconto</th>
                <th>Valor Total com Desconto</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($formasPagamentos as $formasPagamento)
            <tr>
                <td>{!! $formasPagamento->QtdeParcelas !!} parcelas</td>
                <td>R${!! number_format($formasPagamento->BrutoTotal, 2, ',', '.') !!}</td>
                <td>R${!! number_format($formasPagamento->ParcelaBruta, 2, ',', '.') !!}</td>
                <td>R${!! number_format($formasPagamento->DescontoPontualidade, 2, ',', '.') !!}</td>
                <td>R${!! number_format($formasPagamento->ParcelaDescontoPontualidade, 2, ',', '.') !!}</td>
                <td>R${!! number_format($formasPagamento->ValorTotalDesconto, 2, ',', '.') !!}</td>
                <td>
                    <div class='btn-group'>
                        <a href="deletar/{{$formasPagamento->id}}" onclick="return confirm('Tem certeza que deseja deletar a forma de parcelamento?')" class='btn btn-danger btn-sm'><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
