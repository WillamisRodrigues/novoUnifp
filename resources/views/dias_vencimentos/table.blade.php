<div class="table-responsive">
    <table class="table" id="diasVencimentos-table">
        <thead>
            <tr>
                <th>Dias de vencimento</th>
                <th colspan="3"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($diasVencimentos as $diasVencimento)
            <tr>
                <td>Dia {!! $diasVencimento->diaVencimento !!}</td>
                <td>
                    {!! Form::open(['route' => ['diasVencimentos.destroy', $diasVencimento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que desejar deletar o dia de vencimento selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
