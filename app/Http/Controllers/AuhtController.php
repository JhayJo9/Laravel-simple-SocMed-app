<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class AuhtController extends Controller
{
    public function register (Request $request){
        
        $fields = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required', 'max:255', 'email',
            'unique:users'],
            'password' => ['required', 'min:3', 'max:255', 'confirmed']

        ]);
        //register
        $user = User::create($fields);
        
        //login
        Auth::login($user);

        //redirect
        return redirect()->route('dashboard');
    }

    //login user
    public function login (Request $request){
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        //try to login user
        if( Auth::attempt($fields, $request->remember)){ // remember user
            return redirect()->intended('dashboard');
        }
        else{
            return back()->withErrors([
                'failed' => "Please enter the correct credentials"
            ]);
        }
    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate user's session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home
        return redirect('posts');
    }
}   
