@extends('clients.master-layout')

@section('content')
    <div class="verify">
        <div class="verify-form">
            <p>Cảm ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác minh địa chỉ email
                của mình bằng cách nhấp vào liên kết mà chúng tôi vừa gửi qua email cho bạn không?
                Nếu bạn không nhận được email, chúng tôi sẽ sẵn lòng gửi cho bạn một email khác.</p>
            <div class="verify-form-item">
                <form action="{{route('verification.send')}}" method="post" >
                    <button type="submit" >
                        GỬI LẠI LINK XÁC NHẬN
                    </button>
                    @csrf
                </form>
                <a href="{{route('logout')}}">Đăng xuất</a>
            </div>
            <div class="verify-form-item">
                <h3>{{session('message')}}</h3>
            </div>
        </div>
    </div>
@endsection
