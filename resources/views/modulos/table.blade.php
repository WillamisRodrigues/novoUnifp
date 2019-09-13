<div class="table-responsive">
    <table class="table display datatable-list" id="turmas-table">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Módulo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($modulos as $modulo)
            <tr>
                <td>{!! $curso->nomeCurso !!}</td>
                <td>{!! $modulo->nomeModulo !!}</td>
                <td>
                    {!! Form::open(['route' => ['modulos.destroy', $modulo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que deseja deletar o módulo
                        selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
