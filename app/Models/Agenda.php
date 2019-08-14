<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Agenda
 * @package App\Models
 * @version July 26, 2019, 4:24 pm UTC
 *
 * @property string prioridade
 * @property string Data
 * @property time Hora
 * @property string Assunto
 * @property string Tarefa
 * @property string Resolvido
 */
class Agenda extends Model
{
    use SoftDeletes;

    public $table = 'agenda';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'prioridade',
        'Data',
        'Hora',
        'Assunto',
        'Tarefa',
        'Resolvido'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'prioridade' => 'string',
        'Data' => 'date',
        'Assunto' => 'string',
        'Tarefa' => 'string',
        'Resolvido' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'prioridade' => 'required',
        'Data' => 'required',
        'Hora' => 'required',
        'Assunto' => 'required',
        'Tarefa' => 'required',
        'Resolvido' => 'required'
    ];

    
}
