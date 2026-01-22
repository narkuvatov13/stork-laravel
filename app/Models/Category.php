<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\Status;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_active',
        'parent_id',

    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



// Category::create([
//     'name' => $request->name,
//     'slug' => Str::slug($request->name),
// ]))->user()->associate(auth()->user());
