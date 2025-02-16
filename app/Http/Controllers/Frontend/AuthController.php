<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //=======================show user login page======================//
    public function ShowUserLogin()
    {
        return Inertia::render('Frontend/Auth/UserLoginPage');
    }

    //=======================show user register page======================//
    public function ShowUserRegistration()
    {
        return Inertia::render('Frontend/Auth/UserRegistrationPage');
    }

    //======================user registration===========================//
    public function UserRegistration(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:4|confirmed',
                'phone' => 'required|numeric|digits:11|starts_with:01|regex:/^01[0-9]{9}$/|unique:users',
                'address' => 'nullable|string|max:255',
            ],
            [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email',
                'email.email' => 'Please enter a valid email',
                'email.unique' => 'This email is already taken',
                'password.required' => 'Please enter your password',
                'password.min' => 'Password must be at least 4 characters',
                'password.confirmed' => 'Password and confirm password do not match',
                'phone.required' => 'Please enter your phone number',
                'phone.digits' => 'Phone number must be 11 digits',
                'phone.starts_with' => 'Phone number must start with 01',
                'phone.regex' => 'Please enter a valid phone number',
                'phone.unique' => 'This phone number is already taken',
                'address.max' => 'Address must be less than 255 characters',
            ],
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if ($user) {
            $data = ['message' => 'You are registered successfully', 'status' => true];
            return redirect()->route('show.user.login')->with($data);
        } else {
            $data = ['message' => 'Failed to create user', 'status' => false];
            return redirect()->back()->with($data);
        }
    }

    //============================user login =============================//
    public function UserLogin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:4',
        ], [
            'email.required' => 'The email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password is required.',
            'password.min' => 'Password must be at least 4 characters.',
        ]);

        // Attempt login using 'admin' guard
        if (!Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with([
                'message' => 'Email or Password is incorrect',
                'status' => false,
            ]);
        }

        // Check if logged-in user has 'admin' role
        $user = Auth::guard('customer')->user();
        if ($user->role !== 'customer') {
            Auth::guard('customer')->logout();
            return redirect()->back()->with([
                'message' => 'Unauthorized Access! Only registered customer can log in.',
                'status' => false,
            ]);
        }

        // Regenerate session after login
        $request->session()->regenerate();

        return to_route('show.home')->with([
            'message' => 'Login Successful',
            'status' => true,
            'code' => 200,
        ]);
    }

    //========================user logout=======================//
    public function UserLogout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('show.home');
    }
}
