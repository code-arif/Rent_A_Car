<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $car_count = Car::where('status', 1)->count();
        $customer_count = User::where('role', 'customer')->count();
        $cars = Car::where('status', 1)->with('detail', 'rentals')->latest()->limit(6)->get();
        // return $cars;dd();
        $car_for_rent = Car::select('id', 'name', 'daily_rent_price', 'model')->where('status', 1)->where('availability', 'Available')->get();
        return Inertia::render('Frontend/HomePage',[
            'cars' => $cars,
            'car_for_rent' => $car_for_rent,
            'car_count' => $car_count,
            'customer_count' => $customer_count,
        ]);
    }
}
