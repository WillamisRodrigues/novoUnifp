<?php

namespace App\Repositories;

use App\Models\nivelAcesso;
use App\Repositories\BaseRepository;

/**
 * Class nivelAcessoRepository
 * @package App\Repositories
 * @version July 30, 2019, 2:37 pm UTC
*/

class nivelAcessoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'perfilAcesso',
        'nivelAcesso'
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
        return nivelAcesso::class;
    }
}
