<?php

namespace App\Repositories;

use App\Models\Pagamentos;
use App\Repositories\BaseRepository;

/**
 * Class PagamentosRepository
 * @package App\Repositories
 * @version August 19, 2019, 7:59 pm UTC
*/

class PagamentosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numeroDocumento',
        'Matricula',
        'Parcela',
        'Referencia',
        'Vencimento',
        'Status',
        'Forma',
        'DataPgto',
        'Multa',
        'Valor',
        'Usuario',
        'Data'
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
        return Pagamentos::class;
    }
}
