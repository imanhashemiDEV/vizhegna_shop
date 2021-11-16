<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable=[
        'title',
        'slug',
        'image',
        'price',
        'description',
        'category_id',
        'brand_id',
        'title_en',
        'guaranty',
        'product_count'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
       return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
       return $this->hasMany(Gallery::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_product');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class,'product_property')
            ->withPivot(['value']);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->where('status','1');
    }
}
