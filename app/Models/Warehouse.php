<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected  $fillable = [
        'city_id',
        'district_id',
        'name',
        'slug',
        'is_active',
        '',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
