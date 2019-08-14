<?php

namespace App\Repositories;

use App\Models\AulasCronograma;
use App\Repositories\BaseRepository;

/**
 * Class AulasCronogramaRepository
 * @package App\Repositories
 * @version August 1, 2019, 5:26 pm UTC
*/

class AulasCronogramaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomeAula',
        'DataAula',
        'DataTermino',
        'DiasSemana',
        'Planejamento',
        'RelatorioProfessor'
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
        return AulasCronograma::class;
    }
}
