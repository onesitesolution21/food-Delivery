<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'quantity',
        'sku',
        'description',
        'description_notes',
        'category_id',
        'status',
        'image',
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
