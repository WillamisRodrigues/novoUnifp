<?php

namespace App\Repositories;

use App\Models\TempoAula;
use App\Repositories\BaseRepository;

/**
 * Class TempoAulaRepository
 * @package App\Repositories
 * @version July 29, 2019, 8:53 pm UTC
*/

class TempoAulaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tempoAula'
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
        return TempoAula::class;
    }
}
