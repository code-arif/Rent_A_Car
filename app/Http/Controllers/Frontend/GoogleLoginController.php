<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
     // Redirect to Google
     public function googleRedirect()
     {
         return Socialite::driver('google')->redirect();
     }
 
     // Google Callback
     public function googleCallback(Request $request)
     {
         $googleUser = Socialite::driver('google')->user();
        //  dd($googleUser);
 
         // Check if user exists in the database
         $user = User::where('email', $googleUser->email)->first();
 
         if ($user) {
             // If user exists but is NOT a customer, deny login
             if ($user->role !== 'customer') {
                 return redirect()
                     ->route('show.user.login')
                     ->with([
                         'message' => 'Unauthorized Access! Only registered customers can log in.',
                         'status' => false,
                     ]);
             }
         } else {
             // Create new user if not found
             $user = User::create([
                 'name' => $googleUser->name,
                 'email' => $googleUser->email,
                 'google_id' => $googleUser->id,
                 'password' => null,
                 'role' => 'customer',
             ]);
         }
 
         Auth::guard('customer')->login($user);
 
         // Regenerate session for security
         $request->session()->regenerate();
 
         return redirect()
             ->route('show.home')
             ->with([
                 'message' => 'Login Successful',
                 'status' => true,
             ]);
     }
}
