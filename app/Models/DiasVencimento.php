<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DiasVencimento
 * @package App\Models
 * @version August 16, 2019, 5:06 pm UTC
 *
 * @property integer diaVencimento
 */
class DiasVencimento extends Model
{
    use SoftDeletes;

    public $table = 'dias_vencimento';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'diaVencimento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'diaVencimento' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'diaVencimento' => 'required'
    ];

    
}
