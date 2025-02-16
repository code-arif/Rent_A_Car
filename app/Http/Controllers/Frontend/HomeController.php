<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $cars = Car::where('status', 1)->with('detail')->limit(6)->get();
        return Inertia::render('Frontend/HomePage',[
            'cars' => $cars,
        ]);
    }
}
