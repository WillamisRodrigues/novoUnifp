<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DiasSemana
 * @package App\Models
 * @version July 31, 2019, 5:48 pm UTC
 *
 * @property string DiasSemana
 */
class DiasSemana extends Model
{
    use SoftDeletes;

    public $table = 'dias_semana';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'DiasSemana'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'DiasSemana' => 'array'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'DiasSemana' => 'required'
    ];


}
