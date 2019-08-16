<?php

namespace App\Repositories;

use App\Models\DiasVencimento;
use App\Repositories\BaseRepository;

/**
 * Class DiasVencimentoRepository
 * @package App\Repositories
 * @version August 16, 2019, 5:06 pm UTC
*/

class DiasVencimentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'diaVencimento'
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
        return DiasVencimento::class;
    }
}
