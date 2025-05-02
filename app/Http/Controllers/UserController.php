<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Controllers\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($data);
        if($user){
            return redirect()->route('login');
        }
        return back()->with('error', 'Registration failed.');
        

    }  
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('welcome');
        }
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);

    } 
    
    public function logout(){
        Auth::logout();
        return view('login');
    }
}
