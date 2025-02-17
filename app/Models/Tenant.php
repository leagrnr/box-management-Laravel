<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'last_name',
        'name',
        'email',
        'phone',
        'profession',
        'address',
        'city',
        'country',
        'date_of_birth',
        'place_of_birth',
        'bank_account',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
