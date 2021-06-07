<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Repositories\API\CategorieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;

class CategorieController extends AppBaseController
{
    /** @var  Utilisateur\CategorieRepository */
    private $categories;

    public function __construct(CategorieRepository $cat)
    {
        $this->categories = $cat;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories()
    {
        $categories = $this->categories->latest()->get();
        $collection = new Collection([]);
        foreach($categories as $cat) {
            $data = [
                'categorie' => $cat,
                'sousCategorie' => $cat->sous_categories,
            ];
            $collection->push($data);
        }
        if($categories)
            return $this->sendResponse($collection, 'Liste des categories');
        else
            return $this->sendError('Erreur lors de la récupération des categories');
    }

    public function newCategorie(Request $request)
    {
        $insert = Categorie::updateOrCreate(['nom' => $request->categorie]);
        if($insert)
            return $this->sendSuccess('Categorie ajoutée');
        else
            return $this->sendError('Erreur lors de l\'insertion de la categorie');
    }
}
