<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Controllers\AppBaseController;

class TransactionController extends AppBaseController
{
    public function getTransaction()
    {
        $trans = Transaction::all();
        if($trans)
            return $this->sendResponse($trans, 'Liste des transactions');
        else
            return $this->sendError('Erreur lors de la récupération des transactions');
    }

    public function newTransaction(Request $request)
    {
        $insert = Transaction::updateOrCreate(['nom' => $request->transaction]);
        if($insert)
            return $this->sendSuccess('Transaction ajoutée');
        else
            return $this->sendError('Erreur lors de l\'insertion de la transaction');
    }
}
