<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Historique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function historique(){
        if(!Auth::check()){
            return redirect()->back()->with('error', "Veuillez vous connecter");
        }
        $uId = Auth::user()->id;
        $historiques = Historique::latest()->where('user_id', $uId)->get();
        return view('historique', compact('historiques'));
    }
    function aide(){
        if(!Auth::check()){
            return redirect()->back()->with('error', "Veuillez vous connecter");
        }
        $uId = Auth::user()->id;
        $faqs = FAQ::latest()->get();
        return view('aide', compact('faqs'));
    }
    function contact(){
        if(!Auth::check()){
            return redirect()->back()->with('error', "Veuillez vous connecter");
        }

        return view('contact');
    }

}
