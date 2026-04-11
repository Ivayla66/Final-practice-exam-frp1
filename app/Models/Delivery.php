<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'order_deadline',
    ];

    protected $casts = [
        'order_deadline' => 'datetime',
    ];

    protected $appends = ['can_accept_orders'];

    public function getCanAcceptOrdersAttribute(): bool
    {
        return in_array($this->status, ['planned', 'active'], true);
    }

    public function productOrders(): HasMany
    {
        return $this->hasMany(ProductOrder::class);
    }
}
