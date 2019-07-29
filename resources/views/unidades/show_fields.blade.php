{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $unidade->id !!}</p>
</div> --}}
<table class="table table-sm">
    <!-- Nomeunidade Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('NomeUnidade', 'Unidade:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->NomeUnidade !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Cnpj Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('CNPJ', 'CNPJ:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->CNPJ !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Endereco Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Endereco', 'Endereço:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Endereco !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Bairro Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Bairro', 'Bairro:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Bairro !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Cidade Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Cidade', 'Cidade:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Cidade !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Uf Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('UF', 'UF:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->UF !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Telefone1 Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Telefone1', 'Telefone 1:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Telefone1 !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Telefone2 Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Telefone2', 'Telefone 2:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Telefone2 !!}</p></td>
        <td class="col-md-8"></td>
    </tr>

    <!-- Tipo Field -->
    <tr class="row">
        <td class="col-md-2">{!! Form::label('Tipo', 'Tipo:') !!}</td>
        <td class="col-md-2"><p>{!! $unidade->Tipo !!}</p></td>
        <td class="col-md-8"></td>
    </tr>
</table>

{{-- <!-- Logotipo Field -->
<div class="form-group">
    {!! Form::label('Logotipo', 'Logotipo:') !!}
    <p>{!! $unidade->Logotipo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $unidade->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $unidade->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $unidade->deleted_at !!}</p>
</div> --}}
