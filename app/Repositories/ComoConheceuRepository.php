<?php

namespace App\Repositories;

use App\Models\ComoConheceu;
use App\Repositories\BaseRepository;

/**
 * Class ComoConheceuRepository
 * @package App\Repositories
 * @version August 6, 2019, 6:22 pm UTC
*/

class ComoConheceuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ComoConheceu'
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
        return ComoConheceu::class;
    }
}
