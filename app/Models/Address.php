<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'district_id',
        'title',
        'neighborhood',
        'street',
        'building_no',
        'floor',
        'apartment_no',
        'latitude',
        'longitude',
        'is_default',
    ];
}
