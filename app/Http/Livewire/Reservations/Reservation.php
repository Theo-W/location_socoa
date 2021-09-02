<?php

namespace App\Http\Livewire\Reservations;

use Livewire\Component;
use Livewire\WithPagination;

class Reservation extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /* search*/
    public string $search = '';
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('reservation.components.index', [
            'reservations' => \App\Models\Reservation::
            where(function ($query) {
                $query->where('title', 'LIKE', "%{$this->search}%");
            })
            ->paginate(7),
        ]);
    }
}
