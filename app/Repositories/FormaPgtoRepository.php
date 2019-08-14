<?php

namespace App\Repositories;

use App\Models\FormaPgto;
use App\Repositories\BaseRepository;

/**
 * Class FormaPgtoRepository
 * @package App\Repositories
 * @version August 7, 2019, 5:04 pm UTC
*/

class FormaPgtoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'FormaPagamento'
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
        return FormaPgto::class;
    }
}
