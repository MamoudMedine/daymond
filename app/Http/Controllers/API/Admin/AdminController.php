<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\API\UsersRepository;

class AdminController extends AppBaseController
{
    private $admin;
    
    /**
     * __construct
     *
     * @param  mixed $diffusion
     * @return void
     */
    public function __construct(UsersRepository $administrateur)
    {
        $this->admin = $administrateur;
    }

    /**
     * getAdmin
     *
     * @return void
     */
    public function getAdmin()
    {
        $typedif = $this->admin->oldest('name')->get();
        return $this->sendResponse($typedif, 'Liste des admins');
    }
}
