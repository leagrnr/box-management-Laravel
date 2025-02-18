<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bill extends Model
{
    protected $fillable = [
        'contract_id',
        'payment_date',
        'payment_montant',
        'period_number',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
