<div class="container">
    <div class="p-5 m-5">
        <!-- Nome Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('nome', 'Nome:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->nome !!}</p>
        </div>

        <!-- Telefone Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('telefone', 'Telefone:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->telefone !!}</p>
        </div>

        <!-- Email Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('email', 'E-mail:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->email !!}</p>
        </div>

        <!-- Observacao Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('observacao', 'Observação:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->observacao !!}</p>
        </div>

        <!-- Dataretorno Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('dataRetorno', 'Data do Retorno:') !!}</p>
                <p class="col-md-8 col-sm-12">
                    {{-- {!! $visitante->dataRetorno !!} : {!! $visitante->horaRetorno !!} --}}
                    {!! date('H:m', strtotime($visitante->horaRetorno)); !!}
                    {!! date('d/m/Y', strtotime($visitante->dataRetorno)); !!}
                </p>
        </div>

        <!-- Comoconheceu Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('comoConheceu', 'Como Conheceu:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->comoConheceu !!}</p>
        </div>

        <!-- Dataatendimento Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('dataAtendimento', 'Data do Atendimento:') !!}</p>
                <p class="col-md-8 col-sm-12">
                    {{-- {!! $visitante->dataAtendimento !!} --}}
                    {!! date('d/m/Y', strtotime($visitante->dataAtendimento)); !!}
                </p>
        </div>

        <!-- Status Field -->
        <div class="row">
                <p class="col-md-2 col-sm-12">{!! Form::label('status', 'Status:') !!}</p>
                <p class="col-md-8 col-sm-12">{!! $visitante->status !!}</p>
        </div>

    </div>
</div>
