<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


    public function show(string $slug, int $id)
    {
        $customer = Customer::where('id', $id)->orWhere('slug', $slug)->first();

        return view('customer.modal._show', [
            'customer' => $customer
        ]);
    }

    public function store(Request $request)
    {
        Customer::create([
            'last_name'=> $request->get('last_name'),
            'first_name'=> $request->get('first_name'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone'),
            'adress'=> $request->get('adress'),
            'postal_code'=> $request->get('postal_code'),
            'city'=> $request->get('city'),
            'slug' => Str::random(15),
        ]);

        return redirect()->route('customer');
    }

    public function edit(string $slug, int $id)
    {
        $customer = Customer::where('id', $id)->orWhere('slug', $slug)->first();

        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    public function storeEdit($id, Request $request)
    {
         Customer::find($id)->update([
            'last_name'=> $request->get('last_name'),
            'first_name'=> $request->get('first_name'),
            'email'=> $request->get('email'),
            'phone'=> $request->get('phone'),
            'adress'=> $request->get('adress'),
            'postal_code'=> $request->get('postal_code'),
            'city'=> $request->get('city'),
        ]);

        return redirect()->route('customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);

        if ($customer != null){
            $customer->delete();
            return redirect()->route('customer');
        } else {
            return redirect()->route('customer');
        }
    }
}
