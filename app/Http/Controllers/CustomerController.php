<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }


    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'last_name'=> $request->get('last_name'),
            'first_name'=> $request->get('first_name'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone'),
            'adress'=> $request->get('adress'),
            'postal_code'=> $request->get('postal_code'),
            'city'=> $request->get('city'),
        ]);

        dump($customer);

        return redirect()->route('customer');
    }
}
