<div class="container formulario-padrao">
    <!-- Diassemana Field -->
    <div class="row">
        <p class="col-sm-12 col-md-3">{!! Form::label('DiasSemana', 'Dia de Aula:') !!}<span style="color: red">*</span>
        </p>
        <div class="col-sm-12 col-md-6">
            {{-- {!! Form::text('DiasSemana', null, ['class' => 'form-control']) !!} --}}
            <p><input type="checkbox" name="DiasSemana[]" id="Seg" value="Seg"><label for="Seg">Segunda</label></p>
            <p><input type="checkbox" name="DiasSemana[]" id="Ter" value="Ter"><label for="Ter">Terça</label></p>
            <p><input type="checkbox" name="DiasSemana[]" id="Qua" value="Qua"><label for="Qua">Quarta</label></p>
            <p><input type="checkbox" name="DiasSemana[]" id="Qui" value="Qui"><label for="Qui">Quinta</label></p>
            <p><input type="checkbox" name="DiasSemana[]" id="Sex" value="Sex"><label for="Sex">Sexta</label></p>
            <p><input type="checkbox" name="DiasSemana[]" id="Sab" value="Sab"><label for="Sab">Sábado</label></p>
        </div>
    </div>

    <!-- Submit Field -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i>
                Salvar
                Dia de Aula</button>
            <a href="{!! route('diasSemanas.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </div>
    </div>
</div>
