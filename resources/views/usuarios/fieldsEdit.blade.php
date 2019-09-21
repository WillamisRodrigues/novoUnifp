<div class="container formulario-padrao">
    <!-- Name Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('name', 'Nome:') !!}<span style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">{!! Form::text('name', null, ['class' => 'form-control', ])!!}</p>
    </div>
    <!-- Email Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('email', 'Email:') !!}<span style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::email('email', null, ['class' => 'form-control','id'=>'datepicker']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-at"></i>
            </div>
        </div>
    </div>
    <!-- Nascimento Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('nascimento', 'Nascimento:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-md-8 col-sm-12">
            {{-- {!! Form::date('nascimento', null, ['class' => 'form-control', 'id'=>'nascimento', 'value' => $usuario->nascimento]) !!} --}}
            <input type="text" name="nascimento" id="nascimento" class="form-control" value="{{$usuario->nascimento}}" readonly>
        </p>
    </div>
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
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('nivelAcesso', 'Nivel de Acesso:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 select-padrao">
            <select name="nivelAcesso" id="nivelAcesso" style="width: 50%">
                <option value="{!! $usuario->nivelAcesso !!}"></option>
                @foreach ($niveis as $nivel)
                    <option value="{!! $nivel->id !!}">{!! $nivel->name !!}</option>
                @endforeach
            </select>
        </p>
    </div>
    <!-- Unidadeescolar Field -->
    <input type="hidden" name="unidadeEscolar" value="0">

    <!-- id da unidade Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('idUnidade', 'Unidade Escolar:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 select-padrao">
            <select name="idUnidade" id="idUnidade" style="width: 50%">
                <option value="{!! $usuario->idUnidade !!}"></option>
                    @if (Gate::allows('Admin'))
                        @foreach ($unidades as $uni)
                            <option value="{!! $uni->id !!}">{!! $uni->NomeUnidade !!}</option>
                        @endforeach
                    @else
                        <option value="{!! Auth::user()->idUnidade !!}">
                            @foreach ($unidades as $unidade)
                                @if (Auth::user()->idUnidade == $unidade->id)
                                    {!! $unidade->NomeUnidade !!}
                                @endif
                            @endforeach
                        </option>
                    @endif
            </select>
            @if (Gate::allows('Admin'))
                <small><br>Importante: deixar este campo (Unidade Escolar) em branco para o cadastro de um administrador.</small>
            @endif
        </p>

    </div>
    <!-- Password Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12">{!! Form::label('password', 'Senha:') !!}<span style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {{-- {!! Form::password('password', ['class' => 'form-control', 'value' => $usuario->password]) !!} --}}
            <input type="password" name="password" id="password" value="{!! $usuario->password !!}" class="form-control">
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-lock"></i>
            </div>
        </div>
    </div>
    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12"></p>
        <p class="col-md-8 col-sm-12 col-xs-12">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar Usuário</button>
            <a href="{!! route('usuarios.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i> Cancelar</a>
        </p>
    </div>
</div>
