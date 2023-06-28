<?php

namespace App\Actions\PayPal;

use App\Models\PayPay;

class CreatePayPayAction
{
    public static function execute($productId, $userId, $totalPrice, $isPrepay){
        return PayPay::create([
            'product_id' => $productId,
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'is_prepay' => $isPrepay,
        ]);
    }
}
