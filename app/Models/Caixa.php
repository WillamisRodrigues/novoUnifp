<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Caixa
 * @package App\Models
 * @version August 2, 2019, 2:54 pm UTC
 *
 * @property string Tipo
 * @property string Via
 * @property string FormaPgto
 * @property string Status
 * @property string Descricao
 * @property string Aluno
 * @property string Lancamento
 * @property string Vencimento
 * @property float Valor
 * @property string CentroCusto
 * @property string ContaCaixa
 * @property string Usuario
 * @property string|\Carbon\Carbon Data
 */
class Caixa extends Model
{
    use SoftDeletes;

    public $table = 'caixa';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Tipo',
        'Via',
        'FormaPgto',
        'Status',
        'Descricao',
        'Aluno',
        'Lancamento',
        'Vencimento',
        'Valor',
        'CentroCusto',
        'ContaCaixa',
        'Usuario',
        'Data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Tipo' => 'string',
        'Via' => 'string',
        'FormaPgto' => 'string',
        'Status' => 'string',
        'Descricao' => 'string',
        'Aluno' => 'string',
        'Lancamento' => 'date',
        'Vencimento' => 'date',
        'Valor' => 'float',
        'CentroCusto' => 'string',
        'ContaCaixa' => 'string',
        'Usuario' => 'string',
        'Data' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Tipo' => 'required',
        'Via' => 'required',
        'FormaPgto' => 'required',
        'Status' => 'required',
        'Descricao' => 'required',
        'Lancamento' => 'required',
        'Vencimento' => 'required',
        'Valor' => 'required',
        'CentroCusto' => 'required',
        'ContaCaixa' => 'required',
        'Usuario' => 'required',
        'Data' => 'required'
    ];


}
