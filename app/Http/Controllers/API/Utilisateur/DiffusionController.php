<?php

namespace App\Http\Controllers\Api\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Diffusion;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Repositories\API\DiffusionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;

class DiffusionController extends AppBaseController
{
    private $diffusion;
    
    public function __construct(DiffusionRepository $diff)
    {
        $this->diffusion = $diff;
    }


    /**
     * @param $utilisateur_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDiffusions()
    {
        try {
            $diffusions = $this->diffusion->with(['admin', 'utilisateur'])->latest()->get();
            $collection = new Collection([]);
            foreach($diffusions as $diffusion) {
                $data = [
                    'diffusion' => $diffusion,
                    'admin' => $diffusion->admin,
                    'utilisateur' => $diffusion->utilisateur,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des diffusions');
        }catch(\Exception $e){
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * @param $diffusion_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDiffusion($texte)
    {
        try {
            $diffusion = Diffusion::find($diffusion_id);
            return response()->json(['success' => true, 'diffusions' => $diffusion]);
        }catch(\Exception $e){
            return response()->json(['success' => false]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function del_diffusion(Request $request)
    // {
    //     $id = $request->diffusion_id;
    //     $verify = $this->diffusion->find($id);
    //     if($verify) {
    //         $diffusion = $this->diffusion->delete($id);
    //         $diffusions = $this->diffusion->latest()->get();
    //         return $this->sendResponse($diffusions, 'Diffusion supprimé');
    //     }
    //     else
    //         return $this->sendError('Erreur de suppression');
    // }
}
