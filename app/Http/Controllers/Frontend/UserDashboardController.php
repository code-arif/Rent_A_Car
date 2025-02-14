<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserDashboardController extends Controller
{
    //====================show user dashboard===================//
    public function showUserDashboard(){
        return Inertia::render('Frontend/UserDashboardPage');
    }
}
