<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Turma
 * @package App\Models
 * @version August 1, 2019, 3:35 pm UTC
 *
 * @property string Curso
 * @property string NomeTurma
 * @property string DiasDaSemana
 * @property string Periodo
 * @property time Horario
 * @property string DataInicio
 * @property string DataTermino
 * @property string DuracaoAulas
 * @property string Professor
 * @property integer Vagas
 * @property string Cronograma
 */
class Turma extends Model
{
    use SoftDeletes;

    public $table = 'turma';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'idCurso',
        'NomeTurma',
        'DiasDaSemana',
        'Periodo',
        'Horario',
        'DataInicio',
        'DataTermino',
        'DuracaoAulas',
        'Professor',
        'Vagas',
        'Cronograma',
        'Status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'idCurso' => 'string',
        'NomeTurma' => 'string',
        'DiasDaSemana' => 'date',
        'Periodo' => 'string',
        'DataInicio' => 'date',
        'DataTermino' => 'date',
        'DuracaoAulas' => 'string',
        'Professor' => 'string',
        'Vagas' => 'integer',
        'Cronograma' => 'string',
        'Status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idCurso' => 'required',
        'NomeTurma' => 'required',
        'DiasDaSemana' => 'required',
        'Periodo' => 'required',
        'Horario' => 'required',
        'DataInicio' => 'required',
        'DataTermino' => 'required',
        'DuracaoAulas' => 'required',
        'Professor' => 'required',
        'Vagas' => 'required',
        'Cronograma' => 'required',
        'Status' => 'required'
    ];


}
