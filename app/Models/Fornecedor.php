<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Fornecedor
 * @package App\Models
 * @version July 31, 2019, 4:37 pm UTC
 *
 * @property string Fornecedor
 * @property string NomeFantasia
 * @property string CNPJ
 * @property string Endereco
 * @property string Bairro
 * @property string Cidade
 * @property string UF
 * @property string Email
 * @property string Telefone1
 * @property string Telefone2
 * @property string PessoaContato
 * @property string Observacao
 * @property string DataCadastro
 */
class Fornecedor extends Model
{
    use SoftDeletes;

    public $table = 'fornecedor';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Fornecedor',
        'NomeFantasia',
        'CNPJ',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'Email',
        'Telefone1',
        'Telefone2',
        'PessoaContato',
        'Observacao',
        'DataCadastro'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Fornecedor' => 'string',
        'NomeFantasia' => 'string',
        'CNPJ' => 'string',
        'Endereco' => 'string',
        'Bairro' => 'string',
        'Cidade' => 'string',
        'UF' => 'string',
        'Email' => 'string',
        'Telefone1' => 'string',
        'Telefone2' => 'string',
        'PessoaContato' => 'string',
        'Observacao' => 'string',
        'DataCadastro' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Fornecedor' => 'required',
        'Endereco' => 'required',
        'Email' => 'required',
        'Telefone1' => 'required',
        'DataCadastro' => 'required'
    ];

    
}
