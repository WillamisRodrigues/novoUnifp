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
        'Logotipo' => 'string'
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
        'Logotipo' => 'required'
    ];

    
}
