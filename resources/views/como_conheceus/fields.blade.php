<!-- Comoconheceu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ComoConheceu', 'Como Conheceu:') !!}
    {!! Form::text('ComoConheceu', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comoConheceus.index') !!}" class="btn btn-default">Cancel</a> --}}
    <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
        Incluir Aluno</button>
    <a href="{!! route('comoConheceus.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
            class="fa fa-close"></i> Cancelar</a>
</div>
