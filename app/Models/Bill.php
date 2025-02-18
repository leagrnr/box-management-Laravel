<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'contract_id',
        'payment_date',
        'payment_montant',
        'period_number',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
