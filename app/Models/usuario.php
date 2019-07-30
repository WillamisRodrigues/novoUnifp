<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class usuario
 * @package App\Models
 * @version July 30, 2019, 3:19 pm UTC
 *
 * @property string name
 * @property string email
 * @property string nascimento
 * @property integer nivelAcesso
 * @property string unidadeEscolar
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class usuario extends Model
{
    use SoftDeletes;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'nascimento',
        'nivelAcesso',
        'unidadeEscolar',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'nascimento' => 'date',
        'nivelAcesso' => 'integer',
        'unidadeEscolar' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'nascimento' => 'required',
        'nivelAcesso' => 'required',
        'unidadeEscolar' => 'required',
        'password' => 'required'
    ];

    
}
