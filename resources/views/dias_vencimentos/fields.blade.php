<div class="container formulario-padrao">
    <!-- Diavencimento Field -->
    <div class="row">
        <p class="col-xs-12 col-sm-3">{!! Form::label('diaVencimento', 'Dia de vencimento:') !!}</p>
        <div class="col-xs-12 col-sm-6 select-padrao">
            {{-- {!! Form::number('diaVencimento', null, ['class' => 'form-control']) !!} --}}
            <select name="diaVencimento" id="diaVencimento" style="width: 50%">
                @for($i = 1; $i < 29; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="row" style="margin-top: 1rem">
        <div class="col-sm-3"></div>
        {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('diasVencimentos.index') !!}" class="btn btn-default">Cancel</a> --}}
        <button class="btn btn-success btn-flat" style="margin-bottom:1rem" type="submit"><i class="fa fa-save"></i>
            Salvar</button>
        <a href="{!! route('diasVencimentos.index') !!}" style="margin-bottom:1rem" class="btn btn-danger btn-flat"> <i
                class="fa fa-close"></i> Cancelar</a>
    </div>
</div>
