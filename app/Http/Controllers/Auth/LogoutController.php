<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $home = '';
        if(Auth::user()->is_admin==1){
            $home = route('admin.dashboard');
        }else{
            $home = route('home');
        }
        Auth::logout();

        return redirect($home);
    }
}
