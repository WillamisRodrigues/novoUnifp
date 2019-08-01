<?php

namespace App\Repositories;

use App\Models\Cronograma;
use App\Repositories\BaseRepository;

/**
 * Class CronogramaRepository
 * @package App\Repositories
 * @version August 1, 2019, 6:28 pm UTC
*/

class CronogramaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nome',
        'AulasCronograma'
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
        return Cronograma::class;
    }
}
