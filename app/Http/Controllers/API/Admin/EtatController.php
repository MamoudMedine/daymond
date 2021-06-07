<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etat;
use App\Http\Controllers\AppBaseController;

class EtatController extends AppBaseController
{
    public function getEtat()
    {
        $etat = Etat::all();
        if($etat)
            return $this->sendResponse($etat, 'Liste des etats');
        else
            return $this->sendError('Erreur lors de la récupération des etats');
    }

    public function newEtat(Request $request)
    {
        $insert = Etat::updateOrCreate(['nom' => $request->etat]);
        if($insert)
            return $this->sendSuccess('Etat ajoutée');
        else
            return $this->sendError('Erreur lors de l\'insertion de la etat');
    }
}
