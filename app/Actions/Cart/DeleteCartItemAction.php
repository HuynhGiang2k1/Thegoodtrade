<?php

namespace App\Actions\Cart;

use App\Models\Cart;

class DeleteCartItemAction
{
    public static function execute($cartId){
        return Cart::where('id', $cartId)->delete();
    }
}
