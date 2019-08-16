<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pagto
 * @package App\Models
 * @version August 7, 2019, 5:35 pm UTC
 *
 * @property integer Parcela
 * @property string Referencia
 * @property string Status
 * @property string Forma
 * @property string DataPgto
 * @property float Multa
 * @property float Valor
 * @property string Usuario
 * @property string|\Carbon\Carbon Data
 */
class Pagto extends Model
{
    use SoftDeletes;

    public $table = 'pagamentos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Parcela',
        'Referencia',
        'Status',
        'Forma',
        'Vencimento',
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
        'Parcela' => 'integer',
        'Referencia' => 'string',
        'Status' => 'string',
        'Vencimento' => 'date',
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
        'Parcela' => 'required',
        'Referencia' => 'required',
        'Status' => 'required',
        'Forma' => 'required',
        'DataPgto' => 'required',
        'Multa' => 'required',
        'Valor' => 'required',
        'Usuario' => 'required',
        'Data' => 'required'
    ];


}
