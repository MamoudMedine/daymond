<?php

namespace App\Repositories\API;

use App\Models\Utilisateur;
use App\Repositories\BaseRepository;

/**
 * Class UtilisateurRepository
 * @package App\Repositories
 * @version March 19, 2021, 12:21 pm UTC
*/

class UtilisateurRepository extends BaseRepository
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
        return Utilisateur::class;
    }
}
