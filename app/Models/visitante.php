<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class visitante
 * @package App\Models
 * @version July 30, 2019, 4:46 pm UTC
 *
 * @property string nome
 * @property string telefone
 * @property string email
 * @property string observacao
 * @property string dataRetorno
 * @property time horaRetorno
 * @property string comoConheceu
 * @property string dataAtendimento
 * @property string status
 */
class visitante extends Model
{
    use SoftDeletes;

    public $table = 'visita';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'telefone',
        'email',
        'observacao',
        'dataRetorno',
        'horaRetorno',
        'comoConheceu',
        'dataAtendimento',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'telefone' => 'string',
        'email' => 'string',
        'observacao' => 'string',
        'dataRetorno' => 'date',
        'comoConheceu' => 'string',
        'dataAtendimento' => 'date',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'telefone' => 'required',
        'email' => 'required',
        'observacao' => 'required',
        'dataRetorno' => 'required',
        'horaRetorno' => 'required',
        'comoConheceu' => 'required',
        'dataAtendimento' => 'required',
        'status' => 'required'
    ];

    
}
