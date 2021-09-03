<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function store(Request $request): RedirectResponse
    {
        /*$this->validate(request(), [
            'title' => 'required|min:3',
            'last_name' => 'required|min:3',
            'first_name' => 'required|min:3',
            'email' => 'email',
            'phone' => 'required|min:3|max:10',
        ]);*/

        $customer = new Customer;
        $customer->last_name = $request->get('last_name');
        $customer->first_name = $request->get('first_name');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->adress = $request->get('adress');
        $customer->postal_code = $request->get('postal_code');
        $customer->city = $request->get('city');
        $customer->slug = Str::random(15);
        $customer->save();

        return redirect()->route('customer');
    }

    public function edit(string $slug, int $id)
    {
        $customer = Customer::where('id', $id)->orWhere('slug', $slug)->first();

        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    public function storeEdit($id, Request $request): RedirectResponse
    {
        /*$this->validate($request, [
            'title' => 'required|min:3',
            'last_name' => 'required|min:3',
            'first_name' => 'required|min:3',
            'email' => 'email',
            'phone' => 'required|min:3|max:10',
        ]);*/

        $customer = Customer::find($id);
        $customer->last_name = $request->get('last_name');
        $customer->first_name = $request->get('first_name');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->adress = $request->get('adress');
        $customer->postal_code = $request->get('postal_code');
        $customer->city = $request->get('city');
        $customer->save();

        return redirect()->route('customer');
    }

    public function delete($id): RedirectResponse
    {
        $customer = Customer::find($id);

        if ($customer != null) {
            $customer->delete();
            return redirect()->route('customer');
        } else {
            return redirect()->route('customer');
        }
    }
}
