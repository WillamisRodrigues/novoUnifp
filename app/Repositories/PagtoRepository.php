<?php

namespace App\Repositories;

use App\Models\Pagto;
use App\Repositories\BaseRepository;

/**
 * Class PagtoRepository
 * @package App\Repositories
 * @version August 7, 2019, 5:35 pm UTC
*/

class PagtoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Parcela',
        'Referencia',
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
        return Pagto::class;
    }
}
