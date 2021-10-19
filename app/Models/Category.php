<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function parent()
    {
      return $this->belongsTo(Category::class,'parent_id','id')->withDefault(['title'=>'----']);
    }

    public function child()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {
        $children = $this->child()->pluck('id');
        return Product::query()->whereIn('category_id',$children)->get();
    }
}
