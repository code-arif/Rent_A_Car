<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminAuthController extends Controller
{
    //==================show admin login page=====================//
    public function showAdminLogin()
    {
        return Inertia::render('Admin/AdminLoginPage');
    }

    //=================admin login =====================//
    public function AdminLogin(Request $request)
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
        if (!Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with([
                'message' => 'Email or Password is incorrect',
                'status' => false,
            ]);
        }

        // Check if logged-in user has 'admin' role
        $user = Auth::guard('admin')->user();
        if ($user->role !== 'admin') {
            Auth::guard('admin')->logout(); // Logout if not an admin
            return redirect()->back()->with([
                'message' => 'Unauthorized Access! Only admins can log in.',
                'status' => false,
            ]);
        }

        // Regenerate session after login
        $request->session()->regenerate();

        return to_route('show.admin.dashboard')->with([
            'message' => 'Login Successful',
            'status' => true,
            'code' => 200,
        ]);
    }


    //========================admin logout=======================//
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('show.admin.login');
    }
}
