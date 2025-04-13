<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'weight',
        'address',
        'order_deadline',
        'status'
    ];

    // Business Logic: can_accept_orders (derived attribute)
    public function getCanAcceptOrdersAttribute(): bool
    {
        return in_array($this->status, ['planned', 'active']);
    }

    // Status Validation (optional helper)
    public static function validStatuses(): array
    {
        return ['planned', 'active', 'processing', 'delivered'];
    }
}
