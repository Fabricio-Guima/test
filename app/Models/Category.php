<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "image",
        "icon"
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    // relação subcategory - product
    public function products()
    {
        // alvo é Product, quero pega-los e quem tá no meio fica ali em último (subcategory)
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
