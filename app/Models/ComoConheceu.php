<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ComoConheceu
 * @package App\Models
 * @version August 6, 2019, 6:22 pm UTC
 *
 * @property string ComoConheceu
 */
class ComoConheceu extends Model
{
    use SoftDeletes;

    public $table = 'como_conheceu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'ComoConheceu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ComoConheceu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ComoConheceu' => 'required'
    ];

    
}
