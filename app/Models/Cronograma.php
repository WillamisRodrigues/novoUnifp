<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cronograma
 * @package App\Models
 * @version August 1, 2019, 6:28 pm UTC
 *
 * @property string Nome
 * @property string AulasCronograma
 */
class Cronograma extends Model
{
    use SoftDeletes;

    public $table = 'cronograma';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Nome',
        'idAulasCronograma'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nome' => 'string',
        'idAulasCronograma' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nome' => 'required',
        'idAulasCronograma' => 'required'
    ];


}
