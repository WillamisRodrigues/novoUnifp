<?php

namespace App\Repositories;

use App\Models\Fornecedor;
use App\Repositories\BaseRepository;

/**
 * Class FornecedorRepository
 * @package App\Repositories
 * @version July 31, 2019, 4:37 pm UTC
*/

class FornecedorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Fornecedor',
        'NomeFantasia',
        'CNPJ',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'Email',
        'Telefone1',
        'Telefone2',
        'PessoaContato',
        'Observacao',
        'DataCadastro'
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
        return Fornecedor::class;
    }
}
