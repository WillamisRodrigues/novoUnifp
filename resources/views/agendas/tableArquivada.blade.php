<div class="table-responsive">

    <table class="table display datatable-list">
        <thead>
            <tr>
                <th>Prioridade</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Assunto</th>
                <th>Resolvido</th>
                <th>Hora Arquivada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr>
                <td>{!! $agenda->Prioridade !!}</td>
                <td>
                    {!! date('d/m/Y', strtotime($agenda->Data)); !!}
                </td>
                <td>
                    {!! date('H:m', strtotime($agenda->Hora)); !!}
                </td>
                <td>{!! $agenda->Assunto !!}</td>
                <td>{!! $agenda->Resolvido !!}</td>
                <td>
                    {!! date('H:m d/m/Y', strtotime($agenda->updated_at)); !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
