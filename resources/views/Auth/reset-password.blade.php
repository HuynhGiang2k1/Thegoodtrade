@extends('clients.master-layout')

@section('content')

    <div class="card
            position-absolute top-50 start-50 translate-middle
            shadow-sm mb-5 bg-body rounded
            bg-light
" style="min-width: 350px">
        <div class="card-header">
            <h3>Reset Password</h3>
        </div>
        <div class="card-body">
            <form action="{{route('password.update')}}" method="post"
                  class="form-floating">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="email" name="email" value="{{ request()->query('email') }}"
                       hidden>
                <div class="mb-2">
                    <label for="password">New Password:</label>
                    <input class="form-control border border-success" type="password"
                           name="password">
                    @error("password")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input class="form-control border border-success" type="password"
                           name="password_confirmation">
                    @error("password_confirmation")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <input class="btn btn-outline-primary" type="submit"
                       value="Reset Password">
            </form>
        </div>
    </div>
@endsection
