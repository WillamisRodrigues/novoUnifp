<div class="table-responsive">
    <table class="table datatable-list" id="caixas-table">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Via</th>
                <th>Forma</th>
                <th>Situação</th>
                <th>Descrição</th>
                <th>Aluno</th>
                <th>Data de Lançamento</th>
                <th>Data de Vencimento</th>
                <th>Valor</th>
                <th>Conta Caixa</th>
                <th>Centro Custo</th>
                <th>Usuário</th>
                <th>Data/Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($caixas as $caixa)
            <tr>
                <td>{!! $caixa->Tipo !!}</td>
                <td>{!! $caixa->Via !!}</td>
                <td>{!! $caixa->FormaPgto !!}</td>
                <td>
                    @switch($caixa->Status)
                        @case("Pago")
                            {!! "Pago" !!}
                            @break
                        @case("FaltaPagar")
                            {!! "Aguardando Pagamento" !!}
                            @break
                        @default
                            {!! "Sem status definido" !!}
                    @endswitch
                </td>
                <td>{!! $caixa->Descricao !!}</td>
                <td>{!! $caixa->Aluno !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($caixa->Lancamento)); !!}
                </td>
                <td>
                    {!! date('d/m/Y', strtotime($caixa->Vencimento)); !!}
                </td>
                <td>
                    @if ($caixa->Tipo == 'Sangria')
                        <span style="color: #E6564C">R$ -{!! number_format($caixa->Valor, 2, ',', '.') !!}</span>
                    @else
                        <span>R$ {!! number_format($caixa->Valor, 2, ',', '.') !!}</span>
                    @endif
                </td>
                <td>{!! $caixa->ContaCaixa !!}</td>
                <td>{!! $caixa->CentroCusto !!}</td>
                <td>{!! $caixa->Usuario !!}</td>
                <td>
                    {!! date('H:m:s d/m/Y', strtotime($caixa->Data)); !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
