<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRequest $req){

            $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'role' => $req->role
        ]);
        auth()->login($user);

        if($req->role === 'provider'){ 
            
           return redirect()->route('setup.provider')->with('user_id', $user->id);

        }

            return redirect()->route('home');
        
    }

    public function login(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email',
            'password'=> 'required|min:8'
        ]);
        if(Auth::attempt($credentials)){

            $user = auth()->user();

            if($user->role === 'provider'){

            // Check if setup exists
                if(!$user->provider){
                    return redirect()->route('setup.provider');
                }
                return redirect('/provider/dashboard');
            }
            return redirect()->route('home');
        }
          return back()->with('error', 'Invalid credentials');
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('home');
    }

}
