<?php

namespace App\Repositories;

use App\Models\Medium;
use App\Repositories\BaseRepository;

/**
 * Class MediumRepository
 * @package App\Repositories
 * @version March 8, 2021, 5:22 pm UTC
*/

class MediumRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'title',
        'detail'
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
        return Medium::class;
    }
}
