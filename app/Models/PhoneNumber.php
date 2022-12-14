<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
