<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }

    public function create()
    {
        return view('reservation.create', [
            'customers' => Customer::all()
        ]);
    }

    public function storeCreate(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3',
            'start' => 'required',
            'end' => 'required',
            'customer_id' => 'required'
        ]);

        $reservation = new Reservation;
        $reservation->title = $request->get('title');
        $reservation->start = $request->get('start');
        $reservation->end = $request->get('end');
        $reservation->pay = (bool)$request->get('pay');
        $reservation->customer_id = $request->get('customer_id');
        $reservation->slug =  Str::random(15);
        $reservation->save();

        return redirect()->route('reservation')->with('success', 'Votre réservation à bien été créer');
    }

    public function edit(string $slug,int $id)
    {
        $customers = Customer::all();
        $reservations = Reservation::where('id', $id)->orWhere('slug', $slug)->first();

        return view('reservation.edit', [
            'customers' => $customers,
            'reservations' => $reservations
        ]);
    }

    public function storeEdit(int $id, Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3',
            'start' => 'required',
            'end' => 'required',
            'customer_id' => 'required'
        ]);
        
        $reservation = Reservation::find($id);
        $reservation->title = $request->get('title');
        $reservation->start = $request->get('start');
        $reservation->end = $request->get('end');
        $reservation->pay = (bool)$request->get('pay');
        $reservation->customer_id = $request->get('customer_id');
        $reservation->save();

        return redirect()->route('reservation')->with('success', 'Votre réservation à bien été modifier');
    }

    public function delete($id): RedirectResponse
    {
        $reservation = Reservation::find($id);

        if ($reservation != null){
            $reservation->delete();
        }
        return redirect()->route('reservation')->with('success', 'Votre réservation à bien été supprimer');
    }
}
