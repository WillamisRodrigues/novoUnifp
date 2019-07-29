<table class="table">
    <!-- Nomeunidade Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('NomeUnidade', 'Unidade:') !!}</td>
        <td class="col-md-6">{!! Form::text('NomeUnidade', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Cnpj Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('CNPJ', 'CNPJ:') !!}</td>
        <td class="col-md-6">{!! Form::text('CNPJ', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Endereco Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Endereco', 'Endereço:') !!}</td>
        <td class="col-md-6">{!! Form::text('Endereco', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Bairro Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Bairro', 'Bairro:') !!}</td>
        <td class="col-md-6">{!! Form::text('Bairro', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Cidade Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Cidade', 'Cidade:') !!}</td>
        <td class="col-md-6">{!! Form::text('Cidade', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Uf Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('UF', 'UF:') !!}</td>
        {{-- <td class="co6-md-4">{!! Form::text('UF', null, ['class' => 'form-control']) !!}</td> --}}
        {{--
        <td class="row">
            <div class="col-md-3">
                <label>{!! Form::radio('UF', 'AC', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> AC </span> </label>
                <label>{!! Form::radio('UF', 'AL', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> AL </span> </label>
                <label>{!! Form::radio('UF', 'AP', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> AP </span> </label>
                <label>{!! Form::radio('UF', 'AM', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> AM </span> </label>
                <label>{!! Form::radio('UF', 'BA', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> BA </span> </label>
                <label>{!! Form::radio('UF', 'CE', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> CE </span> </label>
                <label>{!! Form::radio('UF', 'DF', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> DF </span> </label>
            </div>
            <div class="col-md-3">

                <label>{!! Form::radio('UF', 'ES', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> ES </span> </label>
                <label>{!! Form::radio('UF', 'GO', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> GO </span> </label>
                <label>{!! Form::radio('UF', 'MA', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> MA </span> </label>
                <label>{!! Form::radio('UF', 'MT', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> MT </span> </label>
                <label>{!! Form::radio('UF', 'MS', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> MS </span> </label>
                <label>{!! Form::radio('UF', 'MG', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> MG </span> </label>
                <label>{!! Form::radio('UF', 'PA', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> PA </span> </label>
            </div>
            <div class="col-md-3">
                <label>{!! Form::radio('UF', 'PB', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> PB </span> </label>
                <label>{!! Form::radio('UF', 'PR', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> PR </span> </label>
                <label>{!! Form::radio('UF', 'PE', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> PE </span> </label>
                <label>{!! Form::radio('UF', 'PI', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> PI </span> </label>
                <label>{!! Form::radio('UF', 'RJ', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> RJ </span> </label>
                <label>{!! Form::radio('UF', 'RN', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> RN </span> </label>
                <label>{!! Form::radio('UF', 'RS', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> RS </span> </label>
            </div>
            <div class="col-md-3">
                <label>{!! Form::radio('UF', 'RO', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> RO </span> </label>
                <label>{!! Form::radio('UF', 'RR', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> RR </span> </label>
                <label>{!! Form::radio('UF', 'SC', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> SC </span> </label>
                <label>{!! Form::radio('UF', 'SP', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> SP </span> </label>
                <label>{!! Form::radio('UF', 'SE', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> SE </span> </label>
                <label>{!! Form::radio('UF', 'TO', ['class' => 'form-control']) !!}
                    <span class="input-radio-prioridade" style="background-color: white; color: black"> TO </span> </label>
            </div>
        </td>
        --}}
        <td>
            {!! Form::select('UF', array(
            'AC' => 'Acre', 'AL' => 'Alagoas', 'AP' => 'Amapá', 'AM' => 'Amazonas', 'BA' => 'Bahia', 'CE' => 'Ceará',
            'DF' => 'Distrito Federal', 'ES' => 'Espírito Santo',
            'GO' => 'Goiás', 'MA' => 'Maranhão', 'MT' => 'Mato Grosso', 'MS' => 'Mato Grosso do Sul', 'MG' => 'Minas
            Gerais', 'PA' => 'Pará', 'PB' => 'Paraíba', 'PR' => 'Paraná',
            'PE' => 'Pernambuco', 'PI' => 'Piauí', 'RJ' => 'Rio de Janeiro', 'RN' => 'Rio Grande de Norte', 'RS' => 'Rio
            Grande do Sul', 'RO' => 'Rondônia', 'RR' => 'Roraima', 'SC' => 'Santa Catarina',
            'SP' => 'São Paulo', 'SE' => 'Sergipe', 'TO' => 'Tocantins'
            ), ['class' => 'custom-select']) !!}
        </td>
    </tr>

    <!-- Telefone1 Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Telefone1', 'Telefone 1:') !!}</td>
        <td class="col-md-6">{!! Form::text('Telefone1', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Telefone2 Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Telefone2', 'Telefone 2:') !!}</td>
        <td class="col-md-6">{!! Form::text('Telefone2', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Tipo Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Tipo', 'Tipo:') !!}</td>
        {{-- <td class="co6-md-4">{!! Form::text('Tipo', null, ['class' => 'form-control']) !!}</td> --}}
        <td class="row">
            <label>{!! Form::radio('Tipo', 'Propria', ['class' => 'form-control'])
                !!} <span class="input-radio-prioridade" style="background-color: white; color: black"> Própria </span>
            </label>
            <label>{!! Form::radio('Tipo', 'Franquia', ['class' => 'form-control'])
                !!} <span class="input-radio-prioridade" style="background-color: white; color: black"> Franquia </span>
            </label>
        </td>
    </tr>

    <!-- Logotipo Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Logotipo', 'Logotipo:') !!}</td>
        <td class="col-md-6">{!! Form::file('Logotipo', null, ['class' => 'form-control']) !!}</td>
    </tr>

    <!-- Submit Field -->
    <tr class="row">
        <td class="col-md-2"></td>
        <td class="col-md-6">
            {{-- {!! Form::submit('Salvar Unidade', ['class' => 'btn btn-success btn-flat']) !!}
            <a href="{!! route('unidades.index') !!}" class="btn btn-default btn-flat">Cancelar</a> --}}
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar
                Unidade</button>
            <a href="{!! route('unidades.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </td>
    </tr>
</table>
