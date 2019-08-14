<?php

namespace App\Repositories;

use App\Models\Unidade;
use App\Repositories\BaseRepository;

/**
 * Class UnidadeRepository
 * @package App\Repositories
 * @version July 29, 2019, 6:45 pm UTC
*/

class UnidadeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'NomeUnidade',
        'CNPJ',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'Telefone1',
        'Telefone2',
        'Tipo',
        'Contrato1',
        'Assinatura1',
        'Contrato2',
        'Assinatura2',
        'Matricula1',
        'Valores1',
        'Matricula2',
        'Valores2',
        'Prestadora',
        'MultaContrato',
        'Multa',
        'MoraContrato',
        'Mora',
        'Logotipo'
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
        return Unidade::class;
    }
}
