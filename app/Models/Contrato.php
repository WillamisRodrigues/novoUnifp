<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contrato
 * @package App\Models
 * @version August 12, 2019, 3:47 pm UTC
 *
 * @property integer idCurso
 * @property string Contrato1
 * @property string Assinatura1
 * @property string Valores1
 * @property float Matricula1
 * @property string Contrato2
 * @property string Assinatura2
 * @property string Valores2
 * @property float Matricula2
 * @property string Prestadora
 * @property float MultaContrato
 * @property float MoraContrato
 * @property float Multa
 * @property float Mora
 */
class Contrato extends Model
{
    use SoftDeletes;

    public $table = 'contratos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idCurso',
        'Contrato1',
        'Assinatura1',
        'Valores1',
        'Matricula1',
        'Contrato2',
        'Assinatura2',
        'Valores2',
        'Matricula2',
        'Prestadora',
        'MultaContrato',
        'MoraContrato',
        'Multa',
        'Mora',
        'NomeContrato'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idCurso' => 'integer',
        'Contrato1' => 'string',
        'Assinatura1' => 'string',
        'Valores1' => 'string',
        'Matricula1' => 'float',
        'Prestadora' => 'string',
        'MultaContrato' => 'float',
        'MoraContrato' => 'float',
        'Multa' => 'float',
        'Mora' => 'float',
        'NomeContrato' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idCurso' => 'required',
        'Contrato1' => 'required',
        'Assinatura1' => 'required',
        'Valores1' => 'required',
        'Matricula1' => 'required',
        'Prestadora' => 'required',
        'MultaContrato' => 'required',
        'MoraContrato' => 'required',
        'Multa' => 'required',
        'Mora' => 'required',
        'NomeContrato'=>'required'
    ];


}
