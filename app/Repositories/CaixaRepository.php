<?php

namespace App\Repositories;

use App\Models\Caixa;
use App\Repositories\BaseRepository;

/**
 * Class CaixaRepository
 * @package App\Repositories
 * @version August 2, 2019, 2:54 pm UTC
*/

class CaixaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Tipo',
        'Via',
        'FormaPgto',
        'Status',
        'Descricao',
        'Aluno',
        'Lancamento',
        'Vencimento',
        'Valor',
        'CentroCusto',
        'ContaCaixa',
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
        return Caixa::class;
    }
}
