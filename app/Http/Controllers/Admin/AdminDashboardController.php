<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    //===================show dashbaord page =====================//
    public function showAdminDashboard(){
        return Inertia::render('Admin/AdminDashboardPage');
    }
}
