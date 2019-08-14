<?php

namespace App\Repositories;

use App\Models\DiasSemana;
use App\Repositories\BaseRepository;

/**
 * Class DiasSemanaRepository
 * @package App\Repositories
 * @version July 31, 2019, 5:48 pm UTC
*/

class DiasSemanaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'DiasSemana'
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
        return DiasSemana::class;
    }
}
