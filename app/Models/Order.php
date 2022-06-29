<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date', 
        'shipping_date'
    ];

    public function order_item(){
        return $this->belongsToMany(Product::class, 'order_item','order_id','product_id');
    }
}
