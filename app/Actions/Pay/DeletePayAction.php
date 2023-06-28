<?php

namespace App\Actions\Pay;

use App\Models\Pay;

class DeletePayAction
{
    public static function execute($paypalId){
        Pay::where('paypal_id', $paypalId)->delete();
    }
}
