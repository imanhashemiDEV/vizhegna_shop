<?php

namespace App\Models;

use App\Http\Requests\CategoryRequest;
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

    public function subcategory()
    {
        $children = $this->child()->pluck('id');
        return Product::query()->whereIn('category_id',$children)->get();
    }

    public function property_groups()
    {
        return $this->hasMany(PropertyGroup::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function storeCategory(CategoryRequest $request)
    {
        Category::query()->create([
            'title'=>$request->input('title'),
            'slug'=>make_slug($request->input('title')),
            'parent_id'=>$request->input('parent_id')
        ]);
    }
}
