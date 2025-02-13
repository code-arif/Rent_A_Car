<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    //=========================show contact page=========================//
    public function contact(){
        return Inertia::render('Frontend/ContactPage');
    }
}
