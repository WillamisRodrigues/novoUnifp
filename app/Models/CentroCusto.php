<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CentroCusto
 * @package App\Models
 * @version August 1, 2019, 7:18 pm UTC
 *
 * @property string CentroCusto
 */
class CentroCusto extends Model
{
    use SoftDeletes;

    public $table = 'centro_custo';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'CentroCusto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'CentroCusto' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'CentroCusto' => 'required'
    ];

    
}
