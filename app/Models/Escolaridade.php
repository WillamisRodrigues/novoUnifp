<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Escolaridade
 * @package App\Models
 * @version July 29, 2019, 8:23 pm UTC
 *
 * @property string Escolaridade
 */
class Escolaridade extends Model
{
    use SoftDeletes;

    public $table = 'escolaridade';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Escolaridade'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Escolaridade' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Escolaridade' => 'required'
    ];

    
}
