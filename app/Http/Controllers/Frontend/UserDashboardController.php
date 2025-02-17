<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    //===================show user booking history=================//
    public function showBookingHistory($id)
    {
        $id = Auth::guard('customer')->user()->id;
        $rentals = Rental::where('user_id', $id)->with('user', 'car')->orderBy('id', 'desc')->get();
        return Inertia::render('Frontend/Dashboard/BookingHistoryPage', [
            'rentals' => $rentals,
        ]);
    }

    //=====================cancel booking ==========================//
    public function cancelBooking($id)
    {
        $rental = Rental::findOrFail($id);

        if ($rental->status === 'Pending') {
            $rental->update(['status' => 'Cancelled']);
        }

        return redirect()->back()->with('success', 'Booking cancelled successfully.');
    }

    //=====================show user profile =====================//
    public function showUserProfile($id)
    {
        $id = Auth::guard('customer')->user()->id;
        $profile = User::where('role', 'customer')->where('id', $id)->first();
        return Inertia::render('Frontend/Dashboard/ProfilePage', [
            'profile' => $profile,
        ]);
    }

    //=====================update user profile =====================//
    public function updateUserProfile(Request $request)
    {
        $message = [
            'name.required' => 'Please enter your name',
            'phone.required' => 'Please enter your phone number',
            'phone.digits' => 'Phone number must be 11 digits',
            'phone.starts_with' => 'Phone number must start with 01',
            'phone.regex' => 'Please enter a valid phone number',
            'phone.unique' => 'This phone number is already taken',
            'address.max' => 'Address must be less than 255 characters',
        ];

        $validated_data = $request->validate(
            [
                'name' => 'required|string',
                'phone' => 'required|numeric|digits:11|starts_with:01|regex:/^01[0-9]{9}$/|unique:users,phone,' . Auth::guard('customer')->id(),
                'address' => 'nullable|string|max:255',
            ],
            $message,
        );

        $user = Auth::guard('customer')->user();
        $user->update($validated_data);
        return redirect()->back()->with('message', 'Profile updated successfully.');
    }

    //=======================update user password=====================//
    public function updateUserPassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|string',
                'newPassword' => 'required|string|min:4|confirmed',
            ],
            [
                'password.required' => 'Please enter your current password.',
                'newPassword.required' => 'Please enter a new password.',
                'newPassword.min' => 'New password must be at least 4 characters.',
                'newPassword.confirmed' => 'New password and confirmation do not match.',
            ],
        );

        $user = Auth::guard('customer')->user();

        // Check if the old password is correct
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with(['message' => 'Old password is incorrect.']);
        }

        // Update the user's password
        $user->update(['password' => Hash::make($request->newPassword)]);

        return redirect()->back()->with('message', 'Password updated successfully.');
    }
}
