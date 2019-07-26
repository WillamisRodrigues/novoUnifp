<?php

namespace App\Repositories;

use App\Models\Agenda;
use App\Repositories\BaseRepository;

/**
 * Class AgendaRepository
 * @package App\Repositories
 * @version July 26, 2019, 4:24 pm UTC
*/

class AgendaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'prioridade',
        'Data',
        'Hora',
        'Assunto',
        'Tarefa',
        'Resolvido'
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
        return Agenda::class;
    }
}
