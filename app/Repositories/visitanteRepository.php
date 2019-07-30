<?php

namespace App\Repositories;

use App\Models\visitante;
use App\Repositories\BaseRepository;

/**
 * Class visitanteRepository
 * @package App\Repositories
 * @version July 30, 2019, 4:46 pm UTC
*/

class visitanteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'telefone',
        'email',
        'observacao',
        'dataRetorno',
        'horaRetorno',
        'comoConheceu',
        'dataAtendimento',
        'status'
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
        return visitante::class;
    }
}
