<?php

namespace App\Repositories;

use App\Models\Curso;
use App\Repositories\BaseRepository;

/**
 * Class CursoRepository
 * @package App\Repositories
 * @version August 1, 2019, 2:28 pm UTC
*/

class CursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomeCurso',
        'QtdeAulas',
        'CargaHoraria'
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
        return Curso::class;
    }
}
