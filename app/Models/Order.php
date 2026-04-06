<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'created_by',
        'order_date',
        'delivery_address',
        'status',
        'notes',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function photos(): HasMany
    {
        return $this->hasMany(OrderPhoto::class);
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function deliveredPhoto(): HasOne
    {
        return $this->hasOne(OrderPhoto::class)->where('type', 'delivered');
    }

    public function loadedPhoto(): HasOne
    {
        return $this->hasOne(OrderPhoto::class)->where('type', 'loaded');
    }
}