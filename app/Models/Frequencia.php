<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Frequencia
 * @package App\Models
 * @version August 6, 2019, 5:19 pm UTC
 *
 * @property integer idAluno
 * @property integer idTurma
 * @property integer idAula
 * @property boolean Frequencia
 */
class Frequencia extends Model
{
    use SoftDeletes;

    public $table = 'frequencia';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idAluno',
        'idTurma',
        'idAula',
        'Frequencia'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idFrequencia' => 'integer',
        'idAluno' => 'integer',
        'idTurma' => 'integer',
        'idAula' => 'integer',
        'Frequencia' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idFrequencia' => 'required',
        'idAluno' => 'required',
        'idTurma' => 'required',
        'idAula' => 'required',
        'Frequencia' => 'required'
    ];

    
}
