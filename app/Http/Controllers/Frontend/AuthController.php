<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    //=======================show user login page======================//
    public function ShowUserLogin()
    {
        return Inertia::render('Frontend/Auth/UserLoginPage');
    }

    //=======================show user register page======================//
    public function ShowUserRegistration(){
        return Inertia::render('Frontend/Auth/UserRegistrationPage');
    }
}
