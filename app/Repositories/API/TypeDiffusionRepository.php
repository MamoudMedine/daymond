<?php

namespace App\Repositories\API;

use App\Models\TypeDiffusion;
use App\Repositories\BaseRepository;

/**
 * Class TypeDiffusionRepository
 * @package App\Repositories
 * @version April 10, 2021, 4:05 pm UTC
*/

class TypeDiffusionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return TypeDiffusion::class;
    }
}
