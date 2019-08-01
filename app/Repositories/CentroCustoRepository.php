<?php

namespace App\Repositories;

use App\Models\CentroCusto;
use App\Repositories\BaseRepository;

/**
 * Class CentroCustoRepository
 * @package App\Repositories
 * @version August 1, 2019, 7:18 pm UTC
*/

class CentroCustoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'CentroCusto'
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
        return CentroCusto::class;
    }
}
