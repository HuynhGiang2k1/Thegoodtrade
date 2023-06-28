@extends('clients.master-layout')

@section('content')
    <div class="mypage-container">
        @include('clients.mypage.sidebar')
        <div>
            @yield('mypage-content')
        </div>
    </div>
@endsection
