<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_no',
        'room_owner_fname',
        'room_owner_lname',
        'tel',
        'room_owner_id_no',
        'rent_month',
        'elect_cost',
        'water_cost',
        'others',
        'roomate',
    ];
    use HasFactory;
}
