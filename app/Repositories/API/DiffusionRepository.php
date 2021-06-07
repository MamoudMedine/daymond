<?php

namespace App\Repositories\API;

use App\Models\Diffusion;
use App\Repositories\BaseRepository;

/**
 * Class DiffusionRepository
 * @package App\Repositories
 * @version March 21, 2021, 11:16 am UTC
*/

class DiffusionRepository extends BaseRepository
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
        return Diffusion::class;
    }
}
