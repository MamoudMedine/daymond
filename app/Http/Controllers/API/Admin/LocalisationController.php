<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Localisation;
use App\Http\Controllers\AppBaseController;

class LocalisationController extends AppBaseController
{
    public function getLocalisation()
    {
        $localisation = Localisation::orderBy('nom', 'ASC')->get();
        if($localisation)
            return $this->sendResponse($localisation, 'Liste des localisations');
        else
            return $this->sendError('Erreur lors de la récupération des localisations');
    }

    public function newLocalisation(Request $request)
    {
        $insert = Localisation::updateOrCreate(['nom' => $request->localisation]);
        if($insert)
            return $this->sendSuccess('Localisation ajoutée');
        else
            return $this->sendError('Erreur lors de l\'insertion de la localisation');
    }
}
