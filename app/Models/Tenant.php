<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'profession',
        'adresse',
        'ville',
        'pays',
        'date_de_naissance',
        'lieu_de_naissance',
        'compte_bancaire',
    ];
}
