<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Pay extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'customer_name',
        'customer_phone',
        'customer_address',
        'total_price',
        'is_prepay',
        'paypal_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
