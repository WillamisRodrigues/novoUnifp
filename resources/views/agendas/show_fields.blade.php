{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $agenda->id !!}</p>
</div> --}}
<table class="table table-responsive row mx-auto">
    <!-- Prioridade Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('prioridade', 'Prioridade:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->prioridade !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
    <!-- Data Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('Data', 'Data:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->Data !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
    <!-- Hora Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('Hora', 'Hora:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->Hora !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
    <!-- Assunto Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('Assunto', 'Assunto:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->Assunto !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
    <!-- Tarefa Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('Tarefa', 'Tarefa:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->Tarefa !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
    <!-- Resolvido Field -->
    <tr>
        <td class="col-sm-1">{!! Form::label('Resolvido', 'Resolvido:') !!}</td>
        <td class="col-sm-1">
            <p>{!! $agenda->Resolvido !!}</p>
        </td>
        <td class="col-sm-6 col-md-6"></td>
    </tr>
</table>
    {{-- <!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $agenda->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $agenda->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $agenda->deleted_at !!}</p>
</div> --}}
