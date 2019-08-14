<div class="table-responsive">
    <table class="table" id="formaPgtos-table">
        <thead>
            <tr>
                <th>Forma de pagamento</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($formaPgtos as $formaPgto)
            <tr>
                <td>{!! $formaPgto->FormaPagamento !!}</td>
                <td>
                    {!! Form::open(['route' => ['formaPgtos.destroy', $formaPgto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('formaPgtos.edit', [$formaPgto->id]) !!}" class='btn btn-default btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
