<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unidade
 * @package App\Models
 * @version July 29, 2019, 6:45 pm UTC
 *
 * @property string NomeUnidade
 * @property string CNPJ
 * @property string Endereco
 * @property string Bairro
 * @property string Cidade
 * @property string UF
 * @property string Telefone1
 * @property string Telefone2
 * @property string Tipo
 * @property string Logotipo
 */
class Unidade extends Model
{
    use SoftDeletes;

    public $table = 'unidade';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'NomeUnidade',
        'CNPJ',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'Telefone1',
        'Telefone2',
        'Tipo',
        'Contrato1',
        'Assinatura1',
        'Contrato2',
        'Assinatura2',
        'Matricula1',
        'Valores1',
        'Matricula2',
        'Valores2',
        'Prestadora',
        'MultaContrato',
        'Multa',
        'MoraContrato',
        'Mora',
        'Logotipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NomeUnidade' => 'string',
        'CNPJ' => 'string',
        'Endereco' => 'string',
        'Bairro' => 'string',
        'Cidade' => 'string',
        'UF' => 'string',
        'Telefone1' => 'string',
        'Telefone2' => 'string',
        'Tipo' => 'string',
        'Logotipo' => 'string',
        'Contrato1' => 'string',
        'Assinatura1' => 'string',
        'Contrato2' => 'string',
        'Assinatura2' => 'string',
        'Matricula1' => 'string',
        'Valores1' => 'float',
        'Matricula2' => 'string',
        'Valores2' => 'float',
        'Prestadora' => 'string',
        'MultaContrato' => 'float',
        'Multa' => 'float',
        'MoraContrato' => 'float',
        'Mora'=> 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'NomeUnidade' => 'required',
        'CNPJ' => 'required',
        'Endereco' => 'required',
        'Bairro' => 'required',
        'Cidade' => 'required',
        'UF' => 'required',
        'Telefone1' => 'required',
        'Tipo' => 'required',
        'Contrato1' => 'required',
        'Assinatura1' => 'required',
        'Contrato2' => 'required',
        'Assinatura2' => 'required',
        'Matricula1' => 'required',
        'Valores1' => 'required',
        'Matricula2' => 'required',
        'Valores2' => 'required',
        'Prestadora' => 'required',
        'MultaContrato' => 'required',
        'Multa' => 'required',
        'MoraContrato' => 'required',
        'Mora'=> 'required'
    ];


}
