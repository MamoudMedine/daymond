<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\API\TypeDiffusionRepository;

class TypeDiffusionController extends AppBaseController
{
    private $diff;
    
    /**
     * __construct
     *
     * @param  mixed $diffusion
     * @return void
     */
    public function __construct(TypeDiffusionRepository $diffusion)
    {
        $this->diff = $diffusion;
    }

    /**
     * getTypeDiffusion
     *
     * @return void
     */
    public function getTypeDiffusion()
    {
        $typedif = $this->diff->oldest('nom')->get();
        return $this->sendResponse($typedif, 'Liste des types de diffusion');
    }
}
