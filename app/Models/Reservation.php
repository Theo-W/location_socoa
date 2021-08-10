<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['title', 'start', 'end', 'pay', 'customer_id'];

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }
}
