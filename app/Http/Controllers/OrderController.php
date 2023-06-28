<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Orders\GetOrderPendingAction;
use App\Actions\Admin\Orders\GetOrderSuccessAction;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function orderPending(){
        $orders = GetOrderPendingAction::execute();
        return view('admin.orders.order-success', compact('orders'));
    }

    public function orderSucess(){
        $orders = GetOrderSuccessAction::execute();
        return view('admin.orders.order-success', compact('orders'));
    }
}
