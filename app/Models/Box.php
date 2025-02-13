<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'pays',
        'telephone',
        'email',
        'm²',
        'prix_par_mois',
        'description',
        'disponible',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
