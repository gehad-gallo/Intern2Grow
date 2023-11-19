<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
    	return view('home.index');
    }

    public function myProfile(){
    	return view('home.my_profile');
    }

     public function logOut(){
        Auth::logout();
        return redirect()->route('login');
    }

}
