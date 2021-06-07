<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Niveau;
use App\Http\Controllers\AppBaseController;

class NiveauController extends AppBaseController
{
    public function getNiveau()
    {
        $etat = Niveau::all();
        if($etat)
            return $this->sendResponse($etat, 'Liste des niveaux');
        else
            return $this->sendError('Erreur lors de la récupération des niveaux');
    }
}
