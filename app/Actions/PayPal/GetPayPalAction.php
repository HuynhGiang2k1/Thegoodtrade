<?php

namespace App\Actions\PayPal;

use App\Models\PayPay;

class GetPayPalAction
{
    public static function execute($id){
        return PayPay::find($id);
    }
}
