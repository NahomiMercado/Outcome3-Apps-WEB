<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'customer_number',
        'name_or_company',
        'fiscal_name',
        'rfc',
        'fiscal_address',
        'email',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}