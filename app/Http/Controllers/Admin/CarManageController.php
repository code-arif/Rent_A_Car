<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Inertia\Inertia;
use App\Models\CarDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CarManageController extends Controller
{
    //====================show car list in car manage page=====================//
    public function showCarList()
    {
        $cars = Car::orderBy('id', 'desc')->get();
        return Inertia::render('Admin/Car/CarListPage', [
            'cars' => $cars,
        ]);
    }

    //====================show car add/edit page=====================//
    public function showCarSave($id = null)
    {
        $car = Car::find($id);
        return Inertia::render('Admin/Car/Add_Edit_CarPage', [
            'car' => $car,
        ]);
    }

    //====================car storing =====================//
    public function carStore(Request $request)
    {
        $message = [
            'name.required' => 'Please enter car name',
            'name.max' => 'Car name should not be more than 255 character',
            'brand.required' => 'Please enter car brand',
            'brand.max' => 'Car brand should not be more than 255 character',
            'model.required' => 'Please enter car model',
            'model.max' => 'Car model should not be more than 255 character',
            'year.required' => 'Please enter car year',
            'year.string' => 'Please enter valid car year',
            'car_type.required' => 'Please enter car type',
            'daily_rent_price.required' => 'Please enter daily rent price',
            'daily_rent_price.numeric' => 'Please enter valid daily rent price',
            'weekly_rent_price.numeric' => 'Please enter valid weekly rent price',
            'status.required' => 'Please enter car status',
            'status.boolean' => 'Please enter valid car status',
            'availability.required' => 'Please enter car availability',
            'image.max' => 'Car image should not be more than 2048 KB',
        ];

        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|string',
                'car_type' => 'required|string',
                'daily_rent_price' => 'required|numeric',
                'weekly_rent_price' => 'nullable|numeric',
                'status' => 'required|boolean',
                'availability' => 'required|string',
                'image' => 'nullable|max:2048',
            ],
            $message,
        );

        // Handle image upload properly
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNameToStore = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_url = $image->storeAs('cars', $imageNameToStore, 'public');

            $validatedData['image'] = $image_url;
        }

        //Create car
        $car = Car::create($validatedData);

        if ($car) {
            return redirect()
                ->route('show.car.list')
                ->with([
                    'message' => 'Car created successfully',
                    'status' => true,
                    'code' => 200,
                ]);
        }
    }

    //====================update car =====================//
    public function updateCar(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $message = [
            'name.required' => 'Please enter car name',
            'name.max' => 'Car name should not be more than 255 character',
            'brand.required' => 'Please enter car brand',
            'brand.max' => 'Car brand should not be more than 255 character',
            'model.required' => 'Please enter car model',
            'model.max' => 'Car model should not be more than 255 character',
            'year.required' => 'Please enter car year',
            'year.string' => 'Please enter valid car year',
            'car_type.required' => 'Please enter car type',
            'daily_rent_price.required' => 'Please enter daily rent price',
            'daily_rent_price.numeric' => 'Please enter valid daily rent price',
            'weekly_rent_price.numeric' => 'Please enter valid weekly rent price',
            'status.required' => 'Please enter car status',
            'status.boolean' => 'Please enter valid car status',
            'availability.required' => 'Please enter car availability',
            'image.max' => 'Car image should not be more than 2048 KB',
        ];

        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'year' => 'required|string',
                'car_type' => 'required|string',
                'daily_rent_price' => 'required|numeric',
                'weekly_rent_price' => 'nullable|numeric',
                'status' => 'required|boolean',
                'availability' => 'required|string',
                'image' => 'sometimes|nullable|max:2048',
            ],
            $message,
        );

        if ($request->hasFile('image')) {
            if ($car->image && Storage::disk('public')->exists($car->image)) {
                Storage::disk('public')->delete($car->image);
            }

            $image = $request->file('image');
            $imageNameToStore = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_url = $image->storeAs('cars', $imageNameToStore, 'public');

            $validatedData['image'] = $image_url;
        }

        $car->update($validatedData);

        if ($car) {
            return redirect()
                ->route('show.car.list')
                ->with([
                    'message' => 'Car updated successfully',
                    'status' => true,
                    'code' => 200,
                ]);
        }
    }

    //=======================proudct status change=======================//
    public function changeCarStatus(Request $request, $id)
    {
        //find car
        $car = Car::findOrFail($id);
        if (!$car) {
            $data = ['message' => 'Car not found', 'status' => false, 'code' => 404];
            return redirect()->back()->with($data);
        }
        //change status
        $car->status = $request->status;
        $car->save();

        $data = ['message' => 'Car status changed successfully', 'status' => true, 'code' => 200];
        return redirect()->back()->with($data);
    }

    //===================product delete==================//
    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();

        if ($car) {
            $data = ['message' => 'Car deleted successfully', 'status' => true, 'code' => 200];
            return redirect()->back()->with($data);
        }
    }

    /*================================
    Car Details management
    ================================*/

    // ========================show car details save page=========================//
    public function showSaveCarDetailsPage(Request $request, $id = null)
    {
        $id = $request->query('id');
        $car_details = CarDetails::where('car_id', $id)->first();

        return Inertia::render('Admin/Car/SaveCarDetailsPage', [
            'car_details' => $car_details,
        ]);
    }
}
