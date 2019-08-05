<?php

namespace App\Repositories;

use App\Models\Aluno;
use App\Repositories\BaseRepository;

/**
 * Class AlunoRepository
 * @package App\Repositories
 * @version July 31, 2019, 7:49 pm UTC
*/

class AlunoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Nome',
        'Sexo',
        'NascimentoAluno',
        'EstadoCivilAluno',
        'ProfissaoAluno',
        'RgAluno',
        'CpfAluno',
        'Escolaridade',
        'Email',
        'Curso',
        'Turma',
        'Parcelamento',
        'Vencimento',
        'Mae',
        'Pai',
        'Conheceu',
        'Vendedor',
        'DataCadastro',
        'Parentesco',
        'Pagador',
        'NascimentoContratante',
        'EstadoCivilContratante',
        'ProfissaoContratante',
        'RgContratante',
        'CpfContratante',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'CEP',
        'Telefone',
        'Celular1',
        'Celular2'
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
        return Aluno::class;
    }
}
