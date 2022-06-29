<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description',
        'price'
    ];
    
    public function product_photo(){
        return $this->hasMany(Product_Photo::class);
    }

    public function order_item(){
        return $this->belongsToMany(Order::class, 'order_item','product_id','order_id');
    }

    public function stock(){
        return $this->belongsToMany(Store::class, 'stock','product_id','store_id');
    }
}
