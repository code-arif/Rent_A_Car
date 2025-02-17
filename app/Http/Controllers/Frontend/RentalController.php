<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Car;
use Inertia\Inertia;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Mail\RentalCreatedForAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalCreatedForCustomer;

class RentalController extends Controller
{
    //==================create rent by customer===================//
    public function createRent(Request $request)
    {
        try {
            $message = [
                'car_id.required' => 'Please select a car',
                'name.max' => 'Name should not be more than 255 characters',
                'phone.max' => 'Phone number should not be more than 255 characters',
                'start_date.required' => 'Please select a start date',
                'end_date.required' => 'Please select an end date',
                'pickup_location.max' => 'Pickup location should not be more than 255 characters',
                'drop_off_location.max' => 'Drop off location should not be more than 255 characters',
                'pickup_time.max' => 'Pickup time should not be more than 255 characters',
                'drop_off_time.max' => 'Drop off time should not be more than 255 characters',
            ];

            // Validation
            $validated_data = $request->validate(
                [
                    'car_id' => 'required|exists:cars,id',
                    'name' => 'nullable|string|max:255',
                    'phone' => 'nullable|string|max:255',
                    'start_date' => 'required|date|after_or_equal:today',
                    'end_date' => 'required|date|after:start_date',
                    'pickup_location' => 'nullable|string|max:255',
                    'drop_off_location' => 'nullable|string|max:255',
                    'pickup_time' => 'nullable|string|max:255',
                    'drop_off_time' => 'nullable|string|max:255',
                ],
                $message,
            );

            // Check if the car is available for the selected dates
            $isCarBooked = Rental::where('car_id', $request->car_id)
                ->whereNotIn('status', ['Cancelled', 'Completed'])
                ->where(function ($query) use ($request) {
                    $query->where(function ($query2) use ($request) {
                        $query2->where('start_date', '<=', $request->end_date)->where('end_date', '>=', $request->start_date);
                    });
                })
                ->exists();

            if ($isCarBooked) {
                return redirect()
                    ->back()
                    ->with(['message' => 'This car is not available for the selected dates.']);
            }

            $car = Car::findOrFail($request->car_id);
            $days = \Carbon\Carbon::parse($request->start_date)->diffInDays($request->end_date);
            $totalCost = $car->daily_rent_price * $days;

            $validated_data['total_cost'] = $totalCost;
            $validated_data['user_id'] = Auth::guard('customer')->user()->id;
            $validated_data['status'] = 'Pending';

            // dd($validated_data);

            // Create Rental Record
            $rental_create = Rental::create($validated_data);

            $rental_create->load('user');

            if ($rental_create) {
                // Send Email to Admin
                Mail::to('arifulislam6460@gmail.com')->send(new RentalCreatedForAdmin($rental_create));

                // Send Email to Logged-in User
                Mail::to(Auth::guard('customer')->user()->email)->send(new RentalCreatedForCustomer($rental_create));

                $data = ['message' => 'Rental created successfully', 'status' => true];
                return redirect()->back()->with($data);
            }
        } catch (Exception $e) {
            $data = ['message' => 'Please log in to preceed', 'status' => false];
            return redirect()->back()->with($data);
        }
    }

    //=====================render rental success========================//
    public function rentalSuccess()
    {
        return Inertia::render('Frontend/RentSuccess');
    }
}
