@extends('clients.master-layout')

@section('content')
    <div class="main" >
        <div class="register" >
            <form action="{{route('register')}}" method="post" class="register-form">
                <h3>Đăng ký</h3>
                <div class="register-form-name register-form-item">
                    <span>Họ tên:</span>
                    <input type="text" placeholder="Vui lòng nhập vào họ tên..." name="name"/>
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="register-form-email register-form-item">
                    <span>Email:</span>
                    <input type="email" name="email" placeholder="Vui lòng nhập vào email..."/>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="register-form-password register-form-item">
                    <span>Mật khẩu:</span>
                    <input type="password" name="password" placeholder="Vui lòng nhập vào mật khẩu..."/>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="register-form-passwords register-form-item">
                    <span>Nhập lại mật khẩu:</span>
                    <input type="password" name="password_confirm" placeholder="Vui lòng nhập lại mật khẩu..."/>
                    @error('password_confirm')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                @csrf
                <div class="register-form-options">
                    <button type="submit">Đăng ký</button>
                    <a href="{{route('showform-login')}}">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
@endsection
