<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
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
        return redirect()->route('home');
    }
}
