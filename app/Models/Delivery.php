<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'price_at_purchase',
        'status',
        'order_deadline',
        'payed_at'
    ];

    protected $casts = [
        'price_at_purchase' => 'decimal:2',
        'order_deadline' => 'datetime',
        'payed_at' => 'datetime'
    ];

    /**
     * @return bool
     */
    public function getCanAcceptOrdersAttribute(): bool
    {
        return in_array($this->status, ['planned', 'active']);
    }
}
