<div class="table-responsive">
        <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Tempo de aula</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tempoAulas as $tempoAula)
            <tr>
                <td>{!! $tempoAula->tempoAula !!}</td>
                <td>
                    {!! Form::open(['route' => ['tempoAulas.destroy', $tempoAula->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('tempoAulas.show', [$tempoAula->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        <a href="{!! route('tempoAulas.edit', [$tempoAula->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Você tem certeza que deseja deletar o tempo de aula selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
