<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'user_id',
        'box_id',
        'tenant_id',
        'date_end',
        'date_start',
        'monthly_price',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function contractModel()
    {
        return $this->belongsTo(ContractModel::class);
    }
}
