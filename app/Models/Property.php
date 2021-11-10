<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'property_group_id'
    ];

    public function property_groups()
    {
        return $this->belongsTo(PropertyGroup::class,'property_group_id','id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'product_property')
            ->withPivot(['value']);
    }

    public function getProductValue($id)
    {
        $result = $this->products()->where('product_id',$id);

        if(!$result->exists()){
           return null;
        }

        return $result->first()->pivot->value;
    }
}
