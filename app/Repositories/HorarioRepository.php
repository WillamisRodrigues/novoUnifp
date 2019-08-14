<?php

namespace App\Repositories;

use App\Models\Horario;
use App\Repositories\BaseRepository;

/**
 * Class HorarioRepository
 * @package App\Repositories
 * @version July 31, 2019, 5:35 pm UTC
*/

class HorarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Horario'
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
        return Horario::class;
    }
}
