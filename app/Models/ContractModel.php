<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractModel extends Model
{
    protected $table = 'contracts_model';

    protected $fillable = [
        'name',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
