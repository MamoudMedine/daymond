<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeCout;
use App\Http\Controllers\AppBaseController;

class TypeCoutController extends AppBaseController
{
    public function getPrix()
    {
        $prix = TypeCout::all();
        if($prix)
            return $this->sendResponse($prix, 'Liste des transactions');
        else
            return $this->sendError('Erreur lors de la récupération des transactions');
    }

    public function newPrix(Request $request)
    {
        $insert = TypeCout::updateOrCreate(['nom' => $request->prix]);
        if($insert)
            return $this->sendSuccess('Prix ajoutée');
        else
            return $this->sendError('Erreur lors de l\'insertion de la prix');
    }
}
