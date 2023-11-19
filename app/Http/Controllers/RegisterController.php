<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
	public function index(){
		return view('sign_up.index');
	}

	public function postRegister(Request $request){
		//validation 
		 $message = [
		        'name.required' => 'The name is required.',
		        'email.required' => 'The email is required.',
		        'email.email' => 'The email must be a valid email address.',
		        'password.required' => 'The password field is required.',
		    ];

    	$user = $request->validate([
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|min:6',
    	]);

    	$user = User::create([
    		'name'=>$user['name'],
    		'email'=>$user['email'],
    		'password'=> bcrypt($user['password']),
    	]);

    	if ($user) {
    		return redirect()->route('login')->with(['success'=>'you registered successfuly! please login']);
    	}else{
    		return redirect()->back()->with('error','Registration failed.');
    	}
	}    
}
