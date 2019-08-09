<table class="table" style="width: 50%">
    <!-- Perfilacesso Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('perfilAcesso', 'Nome do Perfil:') !!}<span style="color: red">*</span></td>
        <td>{!! Form::text('perfilAcesso', null, ['class' => 'form-control']) !!}</td>
        <td></td>
    </tr>

    <!-- Nivel Acesso Field -->
    <tr>
        <td></td>
        <td>{!! Form::label('nivelAcesso', 'Nivel de Acesso:') !!}<span style="color: red">*</span></td>
        <td class="select-unifp">{!! Form::select('nivelAcesso', array(
            '0' => 'Administrador', '1' => 'Supervisor', '2' => 'Gestor', '3' => 'Secretaria', '4' => 'Professor', '5'
            => 'Comercial','6' => 'Atendimento','7' => 'Cobrança'), ['class' => 'form-control']) !!}</td>
        <td></td>
    </tr>

    <!-- Submit Field -->
    <tr>
        <td></td>
        <td></td>
        <td>
            <button class="btn btn-success btn-flat" type="submit"><i class="fa fa-save"></i> Salvar Perfil</button>
            <a href="{!! route('nivelAcessos.index') !!}" class="btn btn-danger btn-flat"> <i class="fa fa-close"></i>
                Cancelar</a>
        </td>
        <td></td>
    </tr>
</table>
