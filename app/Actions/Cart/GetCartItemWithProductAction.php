<?php

namespace App\Actions\Cart;

use App\Models\Cart;

class GetCartItemWithProductAction
{
    public static function execute($cart_id){
        return Cart::where('id', $cart_id)->with('product')->first();
    }
}
