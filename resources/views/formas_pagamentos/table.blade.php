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
                <td>{!! $formasPagamento->QtdeParcelas !!}</td>
                <td>{!! $formasPagamento->BrutoTotal !!}</td>
                <td>{!! $formasPagamento->ParcelaBruta !!}</td>
                <td>{!! $formasPagamento->DescontoPontualidade !!}</td>
                <td>{!! $formasPagamento->ParcelaDescontoPontualidade !!}</td>
                <td>{!! $formasPagamento->ValorTotalDesconto !!}</td>
                <td>
                    {{-- {!! Form::open(['route' => ['formasPagamentos.destroy', $formasPagamento->id], 'method' => --}}
                    {{-- 'delete']) !!} --}}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('formasPagamentos.show', [$formasPagamento->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-zoom-in"></i></a> --}}
                        {{-- <a href="{!! route('formasPagamentos.edit', [$formasPagamento->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {{-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja deletar a forma de parcelamento?')"]) !!} --}}
                        <a href="deletar/{{$formasPagamento->id}}" onclick="return confirm('Tem certeza que deseja deletar a forma de parcelamento?')" class='btn btn-danger btn-sm'><i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    {{-- {!! Form::close() !!} --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
