<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\Status;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



// Category::create([
//     'name' => $request->name,
//     'slug' => Str::slug($request->name),
// ]))->user()->associate(auth()->user());
