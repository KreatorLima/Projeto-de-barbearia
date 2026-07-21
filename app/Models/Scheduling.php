<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheduling extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'service',
        'price',
        'barber',
        'date',
        'time',
        'name',
        'phone',
        'notes',
    ];
}