<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{   
    use AuthenticatesUsers;

    public function index(){
    	return view('login.index');
    }


    public function postLogin(Request $request) {
    // Validation
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');

        }else{
            return redirect()->back()->with('error','Invalid data');
        }
    }
}