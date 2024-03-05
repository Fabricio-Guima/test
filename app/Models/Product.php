<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const DRAFT = 1;
    const PUBLISHED = 2;

    protected $fillable = [
        "subcategory_id",
        "brand_id",
        "name",
        "slug",
        "description",
        "price",
        'quantity',
        'status'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    //relação polimórfica um para N
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //mesmo que passando o id da categoria na url, é o slug que irá aparecer magicamente
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
