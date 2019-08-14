<?php

namespace App\Repositories;

use App\Models\Contrato;
use App\Repositories\BaseRepository;

/**
 * Class ContratoRepository
 * @package App\Repositories
 * @version August 12, 2019, 3:47 pm UTC
*/

class ContratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idCurso',
        'Contrato1',
        'Assinatura1',
        'Valores1',
        'Matricula1',
        'Contrato2',
        'Assinatura2',
        'Valores2',
        'Matricula2',
        'Prestadora',
        'MultaContrato',
        'MoraContrato',
        'Multa',
        'Mora'
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
        return Contrato::class;
    }
}
