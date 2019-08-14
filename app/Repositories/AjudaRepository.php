<?php

namespace App\Repositories;

use App\Models\Ajuda;
use App\Repositories\BaseRepository;

/**
 * Class AjudaRepository
 * @package App\Repositories
 * @version July 31, 2019, 6:38 pm UTC
*/

class AjudaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Pagina',
        'Ticket'
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
        return Ajuda::class;
    }
}
