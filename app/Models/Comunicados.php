<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comunicados
 * @package App\Models
 * @version August 8, 2019, 3:17 pm UTC
 *
 * @property integer idAluno
 * @property string Comunicado
 */
class Comunicados extends Model
{
    use SoftDeletes;

    public $table = 'comunicados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idAluno',
        'Comunicado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idAluno' => 'integer',
        'Comunicado' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idAluno' => 'required',
        'Comunicado' => 'required'
    ];

    
}
