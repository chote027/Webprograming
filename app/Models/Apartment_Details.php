<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment_Details extends Model
{
    protected $fillable = [
        'owner_id',
        'apartment_name',
        'no_room',
        'room_no'
    ];
    use HasFactory;
}
