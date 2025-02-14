<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
