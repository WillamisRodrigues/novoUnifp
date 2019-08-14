<div class="container formulario-padrao">
    <!-- Nome Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('nome', 'Nome:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-md-8 col-sm-12 col-xs-12">{!! Form::text('nome', null, ['class' => 'form-control']) !!}</p>
    </div>
    <!-- Telefone Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('telefone', 'Telefone:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12">
            <div class="input-group" style="padding-right: 15px; padding-left: 15px; ">
                {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
        </p>
    </div>
    <!-- Email Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('email', 'E-mail:') !!}<span style="color: red">*</span>
        </p>
        <p class="col-md-8 col-sm-12">
            <div class="input-group" style="padding-right: 15px; padding-left: 15px; ">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                </div>
            </div>
        </p>
    </div>
    <!-- Observacao Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('observacao', 'Observação:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 col-xs-12">{!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
        </p>
    </div>

    <!-- Dataretorno Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('dataRetorno', 'Data de Retorno:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::date('dataRetorno', null, ['class' => 'form-control','id'=>'datepicker']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
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
    <script src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $("input[id*='telefone']").inputmask({
            mask: ['(99) 99999-9999'],
            keepStatic: true
        });
    </script>
    @endsection

    <!-- Horaretorno Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('horaRetorno', 'Hora do Retorno:') !!}<span
                style="color: red">*</span></p>
        {{-- <p class="col-md-8 col-sm-12 col-xs-12">{!! Form::text('horaRetorno', null, ['class' => 'form-control']) !!}</p> --}}
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::text('horaRetorno', null, ['class' => 'form-control timepicker mobile-input-largura']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-clock-o"></i>
            </div>
        </div>
    </div>

    <!-- Dataatendimento Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('dataAtendimento', 'Data do Atendimento:') !!}<span
                style="color: red">*</span></p>
        <div class="input-group col-md-8 col-sm-12 col-xs-12"
            style="padding-right: 15px; padding-left: 15px; padding-bottom: 10px">
            {!! Form::date('dataAtendimento', null, ['class' => 'form-control','id'=>'datepicker']) !!}
            <div class="input-group-addon agenda-input-hora">
                <i class="fa fa-calendar"></i>
            </div>
        </div>
    </div>

    <!-- Comoconheceu Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('comoConheceu', 'Como Conheceu:') !!}<span
                style="color: red">*</span></p>
        <p class="col-sm-12 col-md-6 select-padrao">
            <select name="comoConheceu" id="comoConheceu" style="width: 50%">
                @foreach($comoConheceu as $conheceu )
                <option value="{{ $conheceu->ComoConheceu }}">{{ $conheceu->ComoConheceu }}</option>
                @endforeach
            </select>
        </p>
        {{-- <p class="col-md-8 col-sm-12 col-xs-12 select-conheceu">{!! Form::select('comoConheceu', array('Facebook' =>
            'Facebook', 'Indicacao' => 'Indicação', 'Jornal' => 'Jornal', 'Outdoor' => 'Outdoor', 'Panfletagem' =>
            'Panfletagem', 'Popup' => 'Pop-Up', 'Radio' => 'Rádio', 'Revista' => 'Revista', 'Piq' => 'Senha PIQ',
            'Internet' => 'Site Internet')) !!}</p> --}}
    </div>

    <!-- Status Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12">{!! Form::label('status', 'Status:') !!}<span
                style="color: red">*</span></p>
        <p class="col-md-8 col-sm-12 col-xs-12 row">
            <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('status', 'Agendado', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Agendado </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('status', 'Retornado', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Retornado </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('status', 'Desligado', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Desligado </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('status', 'RetornarContato', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Retornar Contato </span>
            </label>
            <label class="col-xs-12 col-sm-6 col-md-6">{!! Form::radio('status', 'SemInteresse', ['class' =>
                'form-control']) !!} <span class="input-radio-prioridade" style="color: black"> Sem Interesse </span>
            </label>
        </p>
    </div>
    <!-- Submit Field -->
    <div class="row">
        <p class="col-md-4 col-sm-12 col-xs-12"></p>
        <p class="col-md-8 col-sm-12 col-xs-12">
            <button class="btn btn-success btn-flat" style="margin-bottom: 1rem" type="submit"><i
                    class="fa fa-save"></i> Salvar
                Visitante</button>
            <a href="{!! route('visitantes.index') !!}" style="margin-bottom: 1rem" class="btn btn-danger btn-flat"> <i
                    class="fa fa-close"></i>
                Cancelar</a>
        </p>
    </div>
</div>
