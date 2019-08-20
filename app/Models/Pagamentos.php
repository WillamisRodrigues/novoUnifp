<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pagamentos
 * @package App\Models
 * @version August 19, 2019, 7:59 pm UTC
 *
 * @property integer Matricula
 * @property integer Parcela
 * @property string Referencia
 * @property string Vencimento
 * @property string Status
 * @property string Forma
 * @property string DataPgto
 * @property float Multa
 * @property float Valor
 * @property string Usuario
 * @property string|\Carbon\Carbon Data
 */
class Pagamentos extends Model
{
    use SoftDeletes;

    public $table = 'pagamentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Matricula',
        'Parcela',
        'Referencia',
        'Vencimento',
        'Status',
        'Forma',
        'DataPgto',
        'Multa',
        'Valor',
        'Usuario',
        'Data'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'numeroDocumento' => 'integer',
        'Matricula' => 'integer',
        'Parcela' => 'integer',
        'Referencia' => 'string',
        'Vencimento' => 'date',
        'Status' => 'string',
        'Forma' => 'string',
        'DataPgto' => 'date',
        'Multa' => 'float',
        'Valor' => 'float',
        'Usuario' => 'string',
        'Data' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numeroDocumento' => 'required',
        'Matricula' => 'required',
        'Parcela' => 'required',
        'Referencia' => 'required',
        'Vencimento' => 'required',
        'Status' => 'required',
        'Usuario' => 'required'
    ];


}
