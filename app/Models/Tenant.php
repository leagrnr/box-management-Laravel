<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
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
