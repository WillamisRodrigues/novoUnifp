<div class="table-responsive">
    <table class="table datatable-list" id="frequencias-table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Nº da Aula</th>
                <th>Presença</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frequencias as $frequencia)
            <tr>
                <td>{!! $frequencia->idAluno !!}</td>
                <td>{!! $aluno->Nome !!}</td>
                <td>{!! $frequencia->idAula !!}</td>
                <td>
                    @if ( $frequencia->Frequencia == 1)
                        Presente
                    @else
                        Faltou
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
