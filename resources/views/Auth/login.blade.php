@extends('clients.master-layout')

@section('content')
    <div class="main">
        <div class="register">
            <form method="post" action="{{ route('login') }}" class="register-form login-form login-form-height">
                <h3>Đăng nhập</h3>
                <div class="register-form-email register-form-item">
                    <span>Email:</span>
                    <input type="text" name="email" placeholder="Vui lòng nhập vào email..."/>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="register-form-password register-form-item">
                    <span>Mật khẩu:</span>
                    <input type="password" name="password" placeholder="Vui lòng nhập vào mật khẩu..."/>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <span style="color: red; margin-left: 20px" >{{session('msg')}}</span>
                @csrf
                <div class="register-form-options">
                    <button type="submit">Đăng nhập</button>
                    <a href="{{ route('password.request') }}">Quên mật khẩu</a>
                </div>
                <div class="register-form-type">
                    <div class="register-form-type-item">
                        <a href="{{route('google-auth')}}">Login with Google</a>
                    </div>
                    <div class="register-form-type-item">
                        <a href="{{route('facebook-auth')}}">Login with Facebook</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
