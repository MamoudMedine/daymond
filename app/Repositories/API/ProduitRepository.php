<?php

namespace App\Repositories\API;

use App\Models\Produit;
use App\Repositories\BaseRepository;

/**
 * Class API\ProduitRepository
 * @package App\Repositories
 * @version March 22, 2021, 9:11 am UTC
*/

class ProduitRepository extends BaseRepository
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
        return Produit::class;
    }
}
