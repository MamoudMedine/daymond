<?php

namespace App\Repositories\API;

use App\Models\Commande;
use App\Repositories\BaseRepository;

/**
 * Class CommandeRepository
 * @package App\Repositories
 * @version March 22, 2021, 3:04 pm UTC
*/

class CommandeRepository extends BaseRepository
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
        return Commande::class;
    }
}
