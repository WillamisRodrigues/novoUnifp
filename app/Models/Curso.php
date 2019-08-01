<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Curso
 * @package App\Models
 * @version August 1, 2019, 2:28 pm UTC
 *
 * @property string nomeCurso
 * @property integer QtdeAulas
 * @property integer CargaHoraria
 */
class Curso extends Model
{
    use SoftDeletes;

    public $table = 'curso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nomeCurso',
        'QtdeAulas',
        'CargaHoraria'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomeCurso' => 'string',
        'QtdeAulas' => 'integer',
        'CargaHoraria' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomeCurso' => 'required',
        'QtdeAulas' => 'required',
        'CargaHoraria' => 'required'
    ];

    
}
