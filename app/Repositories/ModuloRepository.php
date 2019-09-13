<?php

namespace App\Repositories;

use App\Models\Modulo;
use App\Repositories\BaseRepository;

/**
 * Class ModuloRepository
 * @package App\Repositories
 * @version September 13, 2019, 12:56 pm UTC
*/

class ModuloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idCurso',
        'nomeModulo'
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
        return Modulo::class;
    }
}
