<?php

namespace App\Actions\Admin\Orders;

use App\Models\Pay;

class GetOrderSuccessAction
{
    public static function execute(){
        return Pay::whereNotNull('is_complete')->get();
    }
}
