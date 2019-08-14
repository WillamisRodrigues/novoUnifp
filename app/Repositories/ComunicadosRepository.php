<?php

namespace App\Repositories;

use App\Models\Comunicados;
use App\Repositories\BaseRepository;

/**
 * Class ComunicadosRepository
 * @package App\Repositories
 * @version August 8, 2019, 3:17 pm UTC
*/

class ComunicadosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idAluno',
        'Comunicado'
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
        return Comunicados::class;
    }
}
