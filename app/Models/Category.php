<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\Status;

class Category extends Model
{
    //
    protected $casts = [
        'status' => Status::class,
    ];
}
