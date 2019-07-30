<?php

namespace App\Repositories;

use App\Models\Funcionario;
use App\Repositories\BaseRepository;

/**
 * Class FuncionarioRepository
 * @package App\Repositories
 * @version July 30, 2019, 7:20 pm UTC
*/

class FuncionarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nome',
        'Nascimento',
        'EstadoCivil',
        'Celular',
        'TelefoneFixo',
        'Email',
        'Cargo',
        'Setor',
        'Observacao',
        'Inativo'
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
        return Funcionario::class;
    }
}
