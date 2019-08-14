<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Centro de Custo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($centroCustos as $centroCusto)
            <tr>
                <td>{!! $centroCusto->CentroCusto !!}</td>
                <td>
                    {!! Form::open(['route' => ['centroCustos.destroy', $centroCusto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('centroCustos.show', [$centroCusto->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-zoom-in"></i></a>
                        <a href="{!! route('centroCustos.edit', [$centroCusto->id]) !!}"
                            class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-sm', 'onclick' => "return confirm('Tem certeza que deseja excluir o modelo selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
