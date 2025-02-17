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

    public function replaceVariables(array $variables)
    {
        $content = $this->content;

        foreach ($variables as $key => $value) {
            $content = str_replace(['{{ ' . $key . ' }}', '{{' . $key . '}}'], $value, $content);

        }

        return $content;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
