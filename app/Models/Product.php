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
        'price',
        'user_id',
        'unique_product'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function photo()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
