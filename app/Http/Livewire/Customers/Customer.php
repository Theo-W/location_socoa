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

    public function render()
    {
        return view('customer.components.index');
    }
}
