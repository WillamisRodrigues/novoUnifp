<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AulasCronograma
 * @package App\Models
 * @version August 1, 2019, 5:26 pm UTC
 *
 * @property string NomeAula
 * @property string DataAula
 * @property string DataTermino
 * @property string DiasSemana
 * @property string Planejamento
 * @property string RelatorioProfessor
 */
class AulasCronograma extends Model
{
    use SoftDeletes;

    public $table = 'aulas_cronograma';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'NomeAula',
        'DataAula',
        'DataTermino',
        'DiasSemana',
        'Planejamento',
        'RelatorioProfessor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'NomeAula' => 'string',
        'DataAula' => 'date',
        'DataTermino' => 'date',
        'DiasSemana' => 'string',
        'Planejamento' => 'string',
        'RelatorioProfessor' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DataAula' => 'required',
        'DataTermino' => 'required',
        'DiasSemana' => 'required'
    ];

    
}
