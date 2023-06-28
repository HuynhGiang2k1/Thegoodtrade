@extends('admin.master_layout')

@section('content')
<div class="adminOD">
    <table class="table">
        <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Tên tài khoản</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Giá đơn hàng</th>
            <th>Ngày giao</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->product_id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->customer_name}}</td>
                <td>{{$order->customer_phone}}</td>
                <td>{{$order->customer_address}}</td>
                <td>{{$order->total_price}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
