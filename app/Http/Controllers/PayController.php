<?php

namespace App\Http\Controllers;

use App\Actions\Cart\DeleteCartItemAction;
use App\Actions\Cart\GetCartItemWithProductAction;
use App\Actions\Pay\CreatePayAction;
use App\Actions\Pay\DeletePayAction;
use App\Actions\PayPal\CreatePayPayAction;
use App\Actions\PayPal\GetPayPalAction;
use App\Http\Requests\Pay\CreatePayRequest;
use App\Http\Requests\Pay\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PayController extends Controller
{
    public function create(CreatePayRequest $request){
        Session::put('key', $request->cart_id);
        $cartItem = GetCartItemWithProductAction::execute($request->cart_id);
        $paypal = CreatePayPayAction::execute(
            $cartItem->product->id,
            Auth::id(),
            $cartItem->product->price* $cartItem->quantity,
            $request->way_delivery
        );
        Session::put('paypalId', $paypal->id);
        $wayDelivery = $request->way_delivery;
        return view('clients.pay', compact('cartItem', 'wayDelivery'));
    }

    public function payment(Request $request){
        $cartItem = GetCartItemWithProductAction::execute($request->cart_id);
        $paypal = GetPayPalAction::execute(Session::get('paypalId'));
        CreatePayAction::execute(
            $paypal->product_id, $paypal->user_id, $paypal->total_price,
            $paypal->is_prepay, $request->name, $request->phone,
            $request->address, $paypal->id
        );
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = env('VNPAY_URL');
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = env('VNPAY_CLIENT_ID');//Mã website tại VNPAY
        $vnp_HashSecret = env('VNPAY_CLIENT_SECRET'); //Chuỗi bí mật

        $vnp_TxnRef = uniqid(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $cartItem->product->name;
        $vnp_OrderType = 'billpayment';
        if($request->pay_way == 1) {
            $vnp_Amount = $cartItem->product->price* $cartItem->quantity*100;
        } else
            $vnp_Amount = ($cartItem->product->price* $cartItem->quantity)*10 + 60000*100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
//        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_Inv_Phone"=>$request->phone,
            "vnp_Inv_Email"=>Auth::user()->email,
            "vnp_Inv_Customer"=>$request->name,
         );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

//var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        header('Location: ' . $vnp_Url);
        die();
        // vui lòng tham khảo thêm tại code demo
    }

    public function vnpayReturn(Request $request){
        $cartId = Session::get('key');

        $vnpAmount = $request->vnp_Amount / 100;
        $title = $request->vnp_OrderInfo;
        $date = $this->handleTime($request->vnp_PayDate);
        $vnpTransactionNo = $request->vnp_TransactionNo;
        if($request->vnp_TransactionStatus == 02){
            DeletePayAction::execute(Session::get('paypalId'));
            return view('clients.vnpay.vnpay-error', compact('vnpAmount', 'title', 'date', 'vnpTransactionNo'));
        }

        DeleteCartItemAction::execute($cartId);
        return view('clients.vnpay.vnpay-success', compact('vnpAmount', 'title', 'date', 'vnpTransactionNo'));
    }

    public function handleTime($time){
        $date = new \DateTimeImmutable($time);
        return $date->format('d-m-Y H:i');
    }
}
