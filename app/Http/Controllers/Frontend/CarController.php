<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    //============================car page =============================//
    public function CarPage(Request $request)
    {
        $query = Car::where('status', 1)->with('detail');

        // Filter by car type if provided
        if ($request->has('car_type') && $request->car_type) {
            $query->where('car_type', $request->car_type);
        }

        // Search by car name or price if provided
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('daily_rent_price', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results
        $cars = $query->orderBy('id', 'desc')->paginate(3);

        return Inertia::render('Frontend/CarPage', [
            'cars' => $cars,
        ]);
    }

    //==================car details==================//
     public function showCarDetails($id)
    {
        $cars = Car::where('status', 1)->where('availability', 'Available')->latest()->limit(10)->get();
        $car_details = Car::with('detail')->findOrFail($id);
        return Inertia::render('Frontend/CarDetailsPage',[
            'car_details' => $car_details,
            'cars' => $cars,
        ]);
    }
}
