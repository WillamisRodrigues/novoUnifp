<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TempoAula
 * @package App\Models
 * @version July 29, 2019, 8:53 pm UTC
 *
 * @property string tempoAula
 */
class TempoAula extends Model
{
    use SoftDeletes;

    public $table = 'tempo_aula';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'tempoAula'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tempoAula' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'tempoAula' => 'required'
    ];

    
}
