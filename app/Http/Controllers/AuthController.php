<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // direct home page
    public function homePage(){
        return view('home');
    }

    // direct login page
    public function loginPage(){
        return view('login');
    }
    public function registerPage(){
        return view('register');
    }
    // direct dashboad
    public function dashboard(){
        if (!Auth::check()) {
            return redirect()->route('auth#loginPage'); // Redirect guests to login
        }
    
        if(Auth::user()->role == 'admin'){
            return redirect()->route('category#list');
        }
    
        return redirect()->route('user#home');
    }
    
}
