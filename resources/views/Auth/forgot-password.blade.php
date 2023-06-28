@extends('clients.master-layout')

@section('content')
    <div class="main">
        <div class="register">
            <div class="register-form login-form">
                <h3>Reset Password</h3>
                <div class="register-form-email register-form-item reset-password">
                    <p>
                        Quên mật khẩu? Không vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email
                        của bạn và chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email
                        cho phép bạn chọn một mật khẩu mới.
                    </p>
                    <form action="">
                        <label>Email:</label>
                        <input type="email" placeholder="Vui lòng nhập vào email..." name="email"/>
                        @if(session('status'))
                            <span class="text-success">{{ session('status') }}</span>
                        @endif
                        @error("email")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="register-form-options">
                            <button type="submit">Gửi link đặt lại mật khẩu</button>
                            <a href="/">Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="card--}}
{{--            position-absolute top-50 start-50 translate-middle--}}
{{--            shadow-sm mb-5 bg-body rounded--}}
{{--            bg-light--}}
{{--" style="min-width: 350px; max-width: 400px">--}}
{{--        <div class="card-header">--}}
{{--            <h3>Reset Password</h3>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <div class="card-title">--}}
{{--                <p style="text-align: justify">--}}
{{--                    Forgot your password? No problem. Just let us know your email address--}}
{{--                    and we will email you a password reset link that will allow you to--}}
{{--                    choose a new one.--}}
{{--                </p>--}}
{{--                <form action="" method="post" class="form-floating">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-2">--}}
{{--                        <label for="email">Email:</label>--}}
{{--                        <input class="form-control border border-success" type="email"--}}
{{--                               name="email">--}}
{{--                        @if(session('status'))--}}
{{--                            <span class="text-success">{{ session('status') }}</span>--}}
{{--                        @endif--}}
{{--                        @error("email")--}}
{{--                        <span class="text-danger">{{ $message }}</span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <input class="btn btn-primary" type="submit"--}}
{{--                               value="Send Reset Link To Email">--}}
{{--                        <a href="/">Home</a>--}}
{{--                    </div>--}}

{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}

@endsection

