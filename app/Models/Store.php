<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address',
        'postal_code',
        'city',
        'email',
        'phone_number'
    ];
    public function stock(){
        return $this->belongsToMany(Product::class, 'stock','store_id','product_id');
    }
}
