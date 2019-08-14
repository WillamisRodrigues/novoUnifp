<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Funcionario
 * @package App\Models
 * @version July 30, 2019, 7:20 pm UTC
 *
 * @property string Nome
 * @property string Nascimento
 * @property string EstadoCivil
 * @property string Celular
 * @property string TelefoneFixo
 * @property string Email
 * @property string Cargo
 * @property string Setor
 * @property string Observacao
 * @property string Inativo
 */
class Funcionario extends Model
{
    use SoftDeletes;

    public $table = 'funcionario';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Nome',
        'Nascimento',
        'EstadoCivil',
        'Celular',
        'TelefoneFixo',
        'Email',
        'Cargo',
        'Setor',
        'Observacao',
        'Inativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nome' => 'string',
        'Nascimento' => 'date',
        'EstadoCivil' => 'string',
        'Celular' => 'string',
        'TelefoneFixo' => 'string',
        'Email' => 'string',
        'Cargo' => 'string',
        'Setor' => 'string',
        'Observacao' => 'string',
        'Inativo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nome' => 'required',
        'Nascimento' => 'required',
        'EstadoCivil' => 'required',
        'Celular' => 'required',
        'TelefoneFixo' => 'required',
        'Email' => 'required',
        'Cargo' => 'required',
        'Setor' => 'required',
        'Observacao' => 'required',
        'Inativo' => 'required'
    ];

    
}
