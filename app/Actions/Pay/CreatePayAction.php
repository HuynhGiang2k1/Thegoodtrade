<?php

namespace App\Actions\Pay;

use App\Models\Pay;

class CreatePayAction
{
    public static function execute($productId, $userId, $totalPrice,
                                   $isPrepay, $customerName, $customerPhone,
                                   $customerAddress, $paypalId){
        return Pay::create([
            'product_id' => $productId,
            'user_id' => $userId,
            'customer_name' => $customerName,
            'customer_phone' => $customerPhone,
            'customer_address' => $customerAddress,
            'total_price' => $totalPrice,
            'is_prepay' => $isPrepay,
            'paypal_id' => $paypalId
        ]);
    }
}
