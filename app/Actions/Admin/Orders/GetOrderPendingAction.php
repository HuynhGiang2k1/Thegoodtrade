<?php

namespace App\Actions\Admin\Orders;

use App\Models\Pay;

class GetOrderPendingAction
{
    public static function execute(){
        return Pay::whereNull('is_shipping')->get();
    }
}
