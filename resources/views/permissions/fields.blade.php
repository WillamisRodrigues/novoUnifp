<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resource', 'Resource:') !!}
    {!! Form::text('resource', null, ['class' => 'form-control']) !!}
</div>

<!-- System Field -->
<div class="form-group col-sm-6">
    {!! Form::label('system', 'System:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('system', 0) !!}
        {!! Form::checkbox('system', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('permissions.index') !!}" class="btn btn-default">Cancel</a>
</div>
