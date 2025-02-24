<?php

namespace App\Listeners;

use App\Events\RentalCreated;
use App\Mail\RentalCreatedForAdmin;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentalCreatedForCustomer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRentalEmails
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RentalCreated $event)
    {
        $rental = $event->rental;
        $adminEmail = 'arifulislam6460@gmail.com';
        $customerEmail = $rental->user->email;

        // Send emails
        Mail::to($adminEmail)->send(new RentalCreatedForAdmin($rental));
        Mail::to($customerEmail)->send(new RentalCreatedForCustomer($rental));
    }
}
