<div class="table-responsive">
        <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Escolaridade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($escolaridades as $escolaridade)
            <tr>
                <td>{!! $escolaridade->Escolaridade !!}</td>
                <td>
                    {!! Form::open(['route' => ['escolaridades.destroy', $escolaridade->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('escolaridades.show', [$escolaridade->id]) !!}" class='btn btn-default btn-md'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{!! route('escolaridades.edit', [$escolaridade->id]) !!}" class='btn btn-default btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
