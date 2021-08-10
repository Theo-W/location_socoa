<?php

namespace App\Http\Livewire;

use App\Models\Reservation;
use Livewire\Component;

class Calendar extends Component
{
    public $events = [];

    public function render()
    {
        $this->events = json_encode(Reservation::all());

        return view('calendar.index', [
            'reservations' => $this->events
        ]);
    }

    public function eventChange($event)
    {
        $e = Reservation::find($event['id']);
        $e->start = $event['start'];

        if (\Arr::exists($event, 'end')) {
            $e->end = $event['end'];
        }
        $e->save();
    }
}
