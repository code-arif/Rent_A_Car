<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    //===================show dashbaord page =====================//
    public function showAdminDashboard(){
        $car_count = Car::where('status', 1)->count();
        $customer_count = User::where('role', 'customer')->count();
        $rent_count = Rental::where('status', 'Completed')->count();
        $total_earning = Rental::where('status', 'Completed')->sum('total_cost'); 
        return Inertia::render('Admin/AdminDashboardPage',[
            'car_count' => $car_count,
            'customer_count' => $customer_count,
            'rent_count' => $rent_count,
            'total_earning' => $total_earning,
        ]);
    }
}
