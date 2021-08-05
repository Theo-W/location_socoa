<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =  ['first_name', 'last_name', 'phone', 'email', 'adress', 'postal_code', 'city'];

    public function reservations()
    {
        return $this->belongsTo(Reservation::class);
    }
}
