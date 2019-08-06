<?php

namespace App\Repositories;

use App\Models\Frequencia;
use App\Repositories\BaseRepository;

/**
 * Class FrequenciaRepository
 * @package App\Repositories
 * @version August 6, 2019, 5:19 pm UTC
*/

class FrequenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idAluno',
        'idTurma',
        'idAula',
        'Frequencia'
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
        return Frequencia::class;
    }
}
