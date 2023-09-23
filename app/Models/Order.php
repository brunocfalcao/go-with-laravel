<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'customer_id',
        'identifier',
        'order_number',
        'user_name',
        'user_email',
        'currency',
        'currency_rate',
        'tax_name',
        'tax_rate',
        'status',
        'status_formatted',
        'refunded',
        'refunded_at',
        'subtotal',
        'discount_total',
        'tax',
        'total',
        'subtotal_usd',
        'discount_total_usd',
        'tax_usd',
        'total_usd',
        'subtotal_formatted',
        'discount_total_formatted',
        'tax_formatted',
        'total_formatted',
        'order_id',
        'product_id',
        'variant_id',
        'price_id',
        'product_name',
        'variant_name',
        'price',
        'receipt',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(LemonSqueezyCustomers::class, 'customer_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(LemonSqueezySubscriptions::class, 'order_id');
    }

    public function ProductFile()
    {
        return $this->hasMany(ProductFile::class, 'product_id', 'product_id');
    }
}
