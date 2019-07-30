<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class nivelAcesso
 * @package App\Models
 * @version July 30, 2019, 2:37 pm UTC
 *
 * @property string perfilAcesso
 * @property integer nivelAcesso
 */
class nivelAcesso extends Model
{
    use SoftDeletes;

    public $table = 'perfil';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'perfilAcesso',
        'nivelAcesso'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'perfilAcesso' => 'string',
        'nivelAcesso' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'perfilAcesso' => 'required',
        'nivelAcesso' => 'required'
    ];

    
}
