<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'block',
        'apartment',
        'phone',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
