<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pays;
use App\Http\Controllers\AppBaseController;

class PaysController extends AppBaseController
{
    public function getPays()
    {
        $pays = Pays::orderBy('nom', 'ASC')->get();
        if($pays)
            return $this->sendResponse($pays, 'Liste des pays');
        else
            return $this->sendError('Erreur lors de la récupération des pays');
    }

    public function newPays(Request $request)
    {
        $insert = Pays::updateOrCreate([
            'nom' => $request->pays,
            'indicatif' => $request->indicatif,
            'code' => $request->code
        ]);
        if($insert)
            return $this->sendSuccess('Pays ajouté');
        else
            return $this->sendError('Erreur lors de l\'insertion du pays');
    }
}
