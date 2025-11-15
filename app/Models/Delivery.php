<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'order_deadline'
    ];

    protected $casts = [
        'order_deadline' => 'datetime'
    ];

    /**
     * @return bool
     */
    // Derived attribute: can_accept_orders = true for planned|active
    protected $appends = ['can_accept_orders'];

    public function getCanAcceptOrdersAttribute(): bool
    {
        return in_array($this->status, ['planned','active'], true);
    }
}
