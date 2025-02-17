<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    //=====================show customer list =====================//
    public function showCustomerList()
    {
        $customers = User::where('role', 'customer')->get();
        return Inertia::render('Admin/Customer/CustomerListPage', [
            'customers' => $customers,
        ]);
    }

    //===================rental history for this customer==================//
    public function rentalHistoryForThisCustomer($id)
    {
        $rent_history = User::where('role', 'customer')
            ->with('rents.car')
            ->find($id);

        return response()->json([
            'rents' => $rent_history->rents ?? [],
        ]);
    }

    //=====================delete customer =====================//
    public function deleteCustomer($id){
        $customer = User::where('role', 'customer')->findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('message', 'Customer deleted successfully');
    }
}
