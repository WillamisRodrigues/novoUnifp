<!-- Nomeaula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('NomeAula', 'Nomeaula:') !!}
    {!! Form::text('NomeAula', null, ['class' => 'form-control']) !!}
</div>

<!-- Dataaula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DataAula', 'Dataaula:') !!}
    {!! Form::date('DataAula', null, ['class' => 'form-control','id'=>'DataAula']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#DataAula').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Datatermino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DataTermino', 'Datatermino:') !!}
    {!! Form::date('DataTermino', null, ['class' => 'form-control','id'=>'DataTermino']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#DataTermino').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Diassemana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DiasSemana', 'Diassemana:') !!}
    {!! Form::text('DiasSemana', null, ['class' => 'form-control']) !!}
</div>

<!-- Planejamento Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('Planejamento', 'Planejamento:') !!}
    {!! Form::textarea('Planejamento', null, ['class' => 'form-control']) !!}
</div>

<!-- Relatorioprofessor Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('RelatorioProfessor', 'Relatorioprofessor:') !!}
    {!! Form::textarea('RelatorioProfessor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('aulasCronogramas.index') !!}" class="btn btn-default">Cancel</a>
</div>
