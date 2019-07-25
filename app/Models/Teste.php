<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Teste
 * @package App\Models
 * @version July 24, 2019, 8:46 pm UTC
 *
 * @property string nome
 * @property string sobre
 * @property integer idade
 */
class Teste extends Model
{
    use SoftDeletes;

    public $table = 'teste';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'sobre',
        'idade'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'sobre' => 'string',
        'idade' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'sobre' => 'required',
        'idade' => 'required'
    ];

    
}
