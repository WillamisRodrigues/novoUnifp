<?php

namespace App\Repositories;

use App\Models\Escolaridade;
use App\Repositories\BaseRepository;

/**
 * Class EscolaridadeRepository
 * @package App\Repositories
 * @version July 29, 2019, 8:23 pm UTC
*/

class EscolaridadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Escolaridade'
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
        return Escolaridade::class;
    }
}
