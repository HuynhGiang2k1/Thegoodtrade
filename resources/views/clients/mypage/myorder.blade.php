@extends('clients.mypage.mypage')

@section('mypage-content')
<div class="single-menu single-menu-title">
    <p class="single-menu-img">Ảnh</p>
    <p class="single-menu-name">Tên sản phẩm</p>
    <p class="single-menu-phone">SĐT</p>
    <p class="single-menu-address">Địa chỉ</p>
    <p class="single-menu-time">Ngày thanh toán</p>
    <p class="single-menu-state">Trạng thái</p>
    <p class="single-menu-price"> Giá</p>
</div>
@foreach($pays as $pay)
<div class="single-menu">
    <img src="{{asset('cover/'.$pay->product->cover)}}" alt="" width="100px">
    <p class="single-menu-name">{{$pay->product->name}}</p>
    <p class="single-menu-phone">{{$pay->customer_phone}}</p>
    <p class="single-menu-address">{{$pay->customer_address}}</p>
    <p class="single-menu-time">{{$pay->created_at}}</p>
    @if($pay->is_complete)
        <p class="single-menu-state" style="color:#11ff00;">Đã nhận hàng</p>
    @elseif($pay->is_shipping)
        <p class="single-menu-state" style="color:red;">Đang giao</p>
    @else
        <p class="single-menu-state" style="color:red;">Chờ lấy hàng</p>
    @endif
    <p class="single-menu-price">
        @if($pay->is_prepay)
        <td>@money($pay->total_price * 0.9)</td>
        @else
        <td>Đã thanh toán</td>
        @endif
    </p>
</div>
@endforeach

@endsection
