<?php

namespace App\Repositories;

use App\Models\Turma;
use App\Repositories\BaseRepository;

/**
 * Class TurmaRepository
 * @package App\Repositories
 * @version August 1, 2019, 3:35 pm UTC
*/

class TurmaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Curso',
        'NomeTurma',
        'DiasDaSemana',
        'Periodo',
        'Horario',
        'DataInicio',
        'DataTermino',
        'DuracaoAulas',
        'Professor',
        'Vagas',
        'Cronograma'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Turma::class;
    }
}
