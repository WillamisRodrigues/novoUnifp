<?php

namespace App\Repositories;

use App\Models\Teste;
use App\Repositories\BaseRepository;

/**
 * Class TesteRepository
 * @package App\Repositories
 * @version July 24, 2019, 8:46 pm UTC
*/

class TesteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'sobre',
        'idade'
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
        return Teste::class;
    }
}
