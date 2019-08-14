<div class="table-responsive">
    <table class="table datatable-list" id="frequencias-table">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>ID da Turma</th>
                <th>ID da Aula</th>
                <th>Frequência</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frequencias as $frequencia)
            <tr>
                <td>{!! $frequencia->idAluno !!}</td>
                <td>{!! $frequencia->idTurma !!}</td>
                <td>{!! $frequencia->idAula !!}</td>
                <td>{!! $frequencia->Frequencia !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
