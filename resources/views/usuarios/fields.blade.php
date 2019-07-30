<table class="table">
    <!-- Name Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('name', 'Name:') !!}</td>
        <td>{!! Form::text('name', null, ['class' => 'form-control', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>
    <!-- Email Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('email', 'Email:') !!}</td>
        <td>{!! Form::email('email', null, ['class' => 'form-control', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>
    <!-- Nascimento Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('nascimento', 'Nascimento:') !!}</td>
        <td>{!! Form::date('nascimento', null, ['class' => 'form-control','id'=>'nascimento', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>
    @section('scripts')
    <script src="{{ url('js/datepicker.js') }}"></script>
    <script src="{{ url('js/timepicker.js') }}"></script>
    <script>
        //Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        timeFormat: 'HH:mm:ss'
    })
    </script>
    @endsection

    <!-- Nivelacesso Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('nivelAcesso', 'Nivel de Acesso:') !!}</td>
        <td>{!! Form::number('nivelAcesso', null, ['class' => 'form-control', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>
    <!-- Unidadeescolar Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('unidadeEscolar', 'Unidade Escolar:') !!}</td>
        <td>{!! Form::text('unidadeEscolar', null, ['class' => 'form-control', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>

    <!-- Password Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('password', 'Password:') !!}</td>
        <td>{!! Form::password('password', ['class' => 'form-control', 'style' => 'width: 50%']) !!}</td>
        <td></td>
    </tr>
    <!-- Submit Field -->
    <tr>
        <td></td>
        <td></td>
        <td>
            {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('usuarios.index') !!}" class="btn btn-default">Cancel</a> --}}
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar
                Usuário</button>
            <a href="{!! route('usuarios.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </td>
        <td></td>
    </tr>
</table>
