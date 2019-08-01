<?php

namespace App\Repositories;

use App\Models\FormasPagamento;
use App\Repositories\BaseRepository;

/**
 * Class FormasPagamentoRepository
 * @package App\Repositories
 * @version August 1, 2019, 2:57 pm UTC
*/

class FormasPagamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'QtdeParcelas',
        'BrutoTotal',
        'ParcelaBruta',
        'DescontoPontualidade',
        'ParcelaDescontoPontualidade',
        'ValorTotalDesconto'
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
        return FormasPagamento::class;
    }
}
