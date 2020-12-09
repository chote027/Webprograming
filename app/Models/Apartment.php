<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'tel',
        'apartment_name',
        'id_no',
        'image',
        'apartment_address',
        'apartment_desc',
        'no_room',
        'rent_month',
    ];
    //use HasFactory;
    public function User(){
        return $this->hasOne('App\Models\User');
    }
}
