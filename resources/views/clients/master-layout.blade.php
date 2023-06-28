<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
{{--    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('assets/clients/css/_base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/_grid.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_cart.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_category.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_detailProduct.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_header-slide.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_pay.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_product.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_productNew.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_products.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_resetPass.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_verify.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_register.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_vnpay.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/payview.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/components/_mypage.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</head>
<body>
@include('clients.components.header')
@yield('content')
@include('clients.components.footer')
</body>
<script src="{{asset('assets/clients/js/header.js')}}"></script>
<script>
    @yield('js')
</script>
</html>
