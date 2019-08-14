<div class="table-responsive">
    <table class="table" id="contratos-table">
        <thead>
            <tr>
                <th>NomeContrato</th>
                <th>Idcurso</th>
                <th>Contrato1</th>
                <th>Assinatura1</th>
                <th>Valores1</th>
                <th>Matricula1</th>
                <th>Contrato2</th>
                <th>Assinatura2</th>
                <th>Valores2</th>
                <th>Matricula2</th>
                <th>Prestadora</th>
                <th>Multacontrato</th>
                <th>Moracontrato</th>
                <th>Multa</th>
                <th>Mora</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($contratos as $contrato) --}}
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                {{-- <td>{!! $contrato->NomeContrato !!}</td>
                <td>{!! $contrato->idCurso !!}</td>
                <td>{!! $contrato->Contrato1 !!}</td>
                <td>{!! $contrato->Assinatura1 !!}</td>
                <td>{!! $contrato->Valores1 !!}</td>
                <td>{!! $contrato->Matricula1 !!}</td>
                <td>{!! $contrato->Contrato2 !!}</td>
                <td>{!! $contrato->Assinatura2 !!}</td>
                <td>{!! $contrato->Valores2 !!}</td>
                <td>{!! $contrato->Matricula2 !!}</td>
                <td>{!! $contrato->Prestadora !!}</td>
                <td>{!! $contrato->MultaContrato !!}</td>
                <td>{!! $contrato->MoraContrato !!}</td>
                <td>{!! $contrato->Multa !!}</td>
                <td>{!! $contrato->Mora !!}</td>
                <td>
                    {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('contratos.show', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' =>
                        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td> --}}
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
