<div class="table-responsive">
    <table class="table display datatable-list" id="diasSemanas-table">
        <thead>
            <tr>
                <th>Dias de Aula</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($diasSemanas as $diasSemana)
            <tr>
                <td>{!! $diasSemana->DiasSemana !!}</td>
                <td>
                    {!! Form::open(['route' => ['diasSemanas.destroy', $diasSemana->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('diasSemanas.edit', [$diasSemana->id]) !!}" class='btn btn-default btn-md'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que deseja deletar o dia de aula selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
