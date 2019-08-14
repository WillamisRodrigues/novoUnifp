<?php

namespace App\Repositories;

use App\Models\usuario;
use App\Repositories\BaseRepository;

/**
 * Class usuarioRepository
 * @package App\Repositories
 * @version July 30, 2019, 3:19 pm UTC
*/

class usuarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'nascimento',
        'nivelAcesso',
        'unidadeEscolar',
        'email_verified_at',
        'password',
        'remember_token'
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
        return usuario::class;
    }
}
