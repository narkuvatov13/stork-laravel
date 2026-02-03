<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'name',
        'slug',
        'image',
        'is_active',
        'order',
        'deleted_at',

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    /**
İçecekler (id=1)
 └── Gazlı İçecekler (parent_id=1)
      └── Cola (parent_id=2)

     */

    // Create Slug
    protected static function boot()
    {
        parent::boot();
        // Model Event
        static::creating(function ($category): void {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}



// Category::create([
//     'name' => $request->name,
//     'slug' => Str::slug($request->name),
// ]))->user()->associate(auth()->user());
