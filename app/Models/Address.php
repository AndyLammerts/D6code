<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'street',
        'postal_code',
        'house_number',
        'city',
    ];

    public function Users(){
        return $this->belongsTo(User::class,'user_id');
      }
}
