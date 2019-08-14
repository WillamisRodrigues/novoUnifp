<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FormaPgto
 * @package App\Models
 * @version August 7, 2019, 5:04 pm UTC
 *
 * @property string FormaPagamento
 */
class FormaPgto extends Model
{
    use SoftDeletes;

    public $table = 'forma_pgto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'FormaPagamento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'FormaPagamento' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'FormaPagamento' => 'required'
    ];

    
}
