@extends('clients.master-layout')

@section('content')
<div class="main" style="display: flex; align-items: center; justify-content: center; min-height: 500px; min-height: 600px">
        <div class="wrapper-vnpay-result">
            <span class="title-vnpay-result">
                Thanh toán thành công
            </span>
            <div class="vnpay-result-line"></div>
            <table style="text-align: left">
                <tr>
                    <th>Mã thanh toán: </th>
                    <td>{{$vnpTransactionNo}}</td>
                </tr>
                <tr>
                    <th>Tên sản phẩm: </th>
                    <td>{{$title}}</td>
                </tr>
                <tr>
                    <th>Ngày thực hiện: </th>
                    <td>{{$date}}</td>
                </tr>
                <tr>
                    <th>Tổng tiền: </th>
                    <td>{{$vnpAmount}}</td>
                </tr>
            </table>
            <div style="width: 100%; display: flex; flex-direction: row; justify-content:space-between; align-items:center; margin-top:10px; padding: 4px 20px; font-size: 15px;">
                <a href="/">Quay lại trang chủ</a>
                <a href="{{route('my.orders')}}">Đơn hàng của tôi</a>
            </div>
        </div>
    </div>
@endsection
