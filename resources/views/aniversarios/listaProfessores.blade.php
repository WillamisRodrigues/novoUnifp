<div class="table-responsive">
    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Aniversário</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
            <tr>
                <td>{!! $funcionario->Nome !!}</td>
                {{-- <td>{!! $funcionario->Nascimento !!}</td> --}}
                <td>
                    {!! date('d/m/Y', strtotime($funcionario->Nascimento)); !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
