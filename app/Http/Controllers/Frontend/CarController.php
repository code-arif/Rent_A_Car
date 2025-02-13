<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    //============================car page =============================//
    public function CarPage(){
        return Inertia::render('Frontend/CarPage');
    }
}
