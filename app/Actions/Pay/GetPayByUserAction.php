<?php

namespace App\Actions\Pay;

use App\Models\Pay;

class GetPayByUserAction
{
    public static function execute($uid){
        return Pay::where('user_id', $uid)->with('product')->get();
    }
}
