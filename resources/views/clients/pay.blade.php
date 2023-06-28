@extends('clients.master-layout')

@section('content')

<div class="pay-container">
    <form class="pay-form" action="{{route('payment')}}" method="post" onsubmit="return validateForm()" name="myForm">
        @csrf
        <table class="pay-table">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="{{asset('cover/'.$cartItem->product->cover)}}" alt="">
                    </td>
                    <td>{{$cartItem->product->name}}</td>
                    <td>{{$cartItem->quantity}}</td>
                    <td>@money($cartItem->product->price)</td>
                    <td>@money($cartItem->product->price * $cartItem->quantity)</td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="cart_id" value="{{$cartItem->id}}">
        <div class="pay-content">
            <div class="pay-information">
                <div class="pay-information-item">
                    <label for="">Họ và tên: </label>
                    <input type="text" name="name">
                    <span id="name-error" style="color: red"></span>
                </div>
                <div class="pay-information-item">
                    <label for="">Số điện thoại: </label>
                    <input type="text" name="phone">
                    <span id="phone-error" style="color: red"></span>
                </div>
                <div id="select-address" class="pay-information-item">
                    <label for="">Địa chỉ: </label>
                    <input type="text" name="address">
                    <span id="address-error" style="color: red"></span>
                </div>
            </div>
            <div class="pay-options">
                <input type="hidden" value="{{$cartItem->product->price * $cartItem->quantity}}" id="total-hidden">
                <span>Cách thức giao hàng: </span>
                <input type="hidden" name="wayDelivery" value={{$wayDelivery}}>
                @if($wayDelivery == 1)
                <span>Giao hàng tiêu chuẩn (30.000 đ)</span>
                @else
                <span>Giao hàng nhanh (60.000 đ)</span>
                @endif
                <div class="pay-options-item">
                    <div class="pay-options-item-onl">
                        <input checked type="radio" name="pay_way" value="1" id="pw1" class="pay_way">
                        <label for="pw1">Trực tuyến qua VNPAY (Miễn phí giao hàng)</label>
                    </div>
                    <div class="pay-options-item-off">
                        <input type="radio" name="pay_way" value="2" id="pw2" class="pay_way">
                        <label for="pw2">Thanh toán khi nhận hàng (Đặt cọc 10% giá trị đơn hàng)</label>
                    </div>
                </div>
                <div class="pay-price">
                    <span>Tổng tiền: </span>
                    @if($wayDelivery == 1)
                    <span id="total">@money($cartItem->product->price * $cartItem->quantity)</span>
                    @else
                    <span id="total">@money($cartItem->product->price * $cartItem->quantity)</span>
                    @endif
                </div>
                <div class="pay-btn">
                    <button type="submit">Đặt hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function validateForm() {
        let name = document.forms["myForm"]["name"].value;
        let phone = document.forms["myForm"]["phone"].value;
        let address = document.forms["myForm"]["address"].value;
        let result = true;
        let msgname = "";
        let msgphone = "";
        let msgaddress = "";
        const regexPhoneNumber = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;

        if (name == "") {
            msgname = "Vui lòng nhập họ tên";
            result = false;
        }

        if (phone == "") {
            msgphone = "Vui lòng nhập số điện thoại";
            result = false;
        }

        if (!phone.match(regexPhoneNumber)) {
            msgphone = "Định dạng số điện thoại chưa đúng";
            result = false;
        }

        if (address == "") {
            msgaddress = "Vui lòng nhập địa chỉ";
            result = false;
        }

        document.getElementById('name-error').innerText = msgname;
        document.getElementById('phone-error').innerText = msgphone;
        document.getElementById('address-error').innerText = msgaddress;
        return result;
    }
    $(document).on('click', '.pay_way', function() {
        if ($(this).val() == 1) {
            $("#total").html(($("#total-hidden").val() * 1).toLocaleString("vi", {
                style: "currency",
                currency: "VND"
            }))
        } else {
            $("#total").html(($("#total-hidden").val() * 0.1 + 60000).toLocaleString("vi", {
                style: "currency",
                currency: "VND"
            }))
        }
    })
</script>
@endsection
