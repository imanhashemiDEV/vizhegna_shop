<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'price',
        'status',
        'address_id',
        'transaction_id',
        'user_id'
    ];

    public function orderDetails()
    {
       return $this->hasMany(OrderDetail::class);
    }
}
