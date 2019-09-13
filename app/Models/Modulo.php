<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Modulo
 * @package App\Models
 * @version September 13, 2019, 12:56 pm UTC
 *
 * @property integer idCurso
 * @property string nomeModulo
 */
class Modulo extends Model
{
    use SoftDeletes;

    public $table = 'modulos';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idCurso',
        'nomeModulo',
        'idUnidade'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idCurso' => 'integer',
        'idUnidade' => 'integer',
        'nomeModulo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idCurso' => 'required',
        'nomeModulo' => 'required'
    ];


}
