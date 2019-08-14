<div class="table-responsive">
    <table class="table display datatable-list" id="comoConheceus-table">
        <thead>
            <tr>
                <th>Como Conheceu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comoConheceus as $comoConheceu)
            <tr>
                <td>{!! $comoConheceu->ComoConheceu !!}</td>
                <td>
                    {!! Form::open(['route' => ['comoConheceus.destroy', $comoConheceu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{-- <a href="{!! route('comoConheceus.show', [$comoConheceu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                        {{-- <a href="{!! route('comoConheceus.edit', [$comoConheceu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'onclick' => "return confirm('Tem certeza que deseja deletar o campo selecionado?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
