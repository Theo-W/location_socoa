<?php

namespace App\Http\Livewire\Customers;

use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{
    /**
     * pagination
     * recherhcer
     */

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    /* search*/
    public string $search = '';
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('customer.components.index', [
            'customers' => \App\Models\Customer::
                where(function ($query) {
                    $query->where('last_name', 'LIKE', "%{$this->search}%")
                    ->orWhere('first_name', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                    ->orWhere('phone', 'LIKE', "%{$this->search}%");
                })
                ->paginate(7),
        ]);
    }
}
