@extends('clients.master-layout')

@section('content')

@php
$colors = [
'Đen' => 'linear-gradient(#666666, #000000)',
'Xanh Blue' => 'linear-gradient(#b3ccff, #001a4d)',
'Nâu' => 'linear-gradient(#ffd9b3, #4d1300)',
'Xanh lá' => 'linear-gradient(#d6ffd9, #006007)',
'Xám' => 'linear-gradient(#fcfcfc, #666666)',
'Ánh kim' => 'linear-gradient(#ffffff, #f0f0f0)',
'Nhiều màu' => 'linear-gradient(#ff0000, #ffa500, #ffff00, #00ff00, #0000ff, #4b0082, #ee82ee)',
'Trung tính' => 'linear-gradient(#ffffff, #d99a6c)',
'Cam' => 'linear-gradient(#ffd9b3, #ff4000)',
'Hồng' => 'linear-gradient(#ffcce6, #f00078)',
'Tím' => 'linear-gradient(#ffccff, #660066)',
'Đỏ' => 'linear-gradient(#ff9999, #b70000)',
'Trắng' => 'linear-gradient(#ffffff, #f0f0f0)',
'Vàng' => 'linear-gradient(#fff5cc, #ffcc00)'
];
@endphp
<div class="main">
    <div class="detail-product">
        <div class="detail-product-left">
            <div class="detail-product-left-top grid wide row">
                <div class="detail-product-left-top-item col l-6 m-12 c-12">
                    <img src="{{asset('cover/'.$product->cover)}}" alt="">
                </div>
                @for($i=0; $i< count($product->images); $i++)
                    @php
                    if($i == 3) break;
                    @endphp
                    <div class="detail-product-left-top-item col l-6 m-12 c-12">
                        <img src="{{asset('images/'.$product->images[$i]->image)}}" alt="">
                    </div>
                    @endfor
            </div>
            @php if(count($product->images) > 2) @endphp
            <div class="detail-product-left-bottom grid wide row">
                @for($i=3; $i< count($product->images); $i++)
                    <div class="detail-product-left-bottom-item col l-3">
                        <img src="{{asset('images/'.$product->images[$i]->image)}}" alt="">
                    </div>
                    @endfor
            </div>
        </div>
        <div class="detail-product-right">
            <div class="detail-product-right-wrap">
                <div class="detail-product-right-top">
                    <form action="{{route('cart.store')}}" method="post">
                        @csrf
                        <div class="detail-product-right-top-description">
                            <div class="detail-product-right-top-description-new"><span>Mới</span></div>
                            <h2>{{$product->name}}</h2>
                            @if($product->quantity == 0)
                                <span style="color: red">Đã hết hàng</span>
                                <br>
                            @endif
                            <span>@money($product->price)</span>
                            <div class="detail-product-right-top-description-color">
                                <div class="detail-product-right-top-description-color-title"><span>Màu sắc: </span></div>
                                <div class="detail-product-right-top-description-color-type">
                                    @php
                                    $listcolors = explode('@@', $product->colors);
                                    @endphp
                                    @foreach($listcolors as $key => $color)
                                    <div class="size-wrapper">
                                        <input class="radio-choose" type="radio" {{$key == 0 ? 'checked' : ''}} id="color{{$color}}" name="color" value="{{$color}}">
                                        <label style="background:{{$colors[$color]}};" for="color{{$color}}"></label>
                                    </div>

                                    @endforeach
                                </div>
                                @error('color')
                                <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <div class="detail-product-right-top-description-size">
                                <div class="detail-product-right-top-description-size-title">
                                    <span>Kích thước: </span>
                                    @php
                                    $listsizes = explode('@@', $product->sizes);
                                    @endphp
                                </div>
                                <div class="detail-product-right-top-description-size-type">
                                    <div class="detail-product-right-top-description-size-type-item">
                                        @foreach($listsizes as $key => $size)
                                        <div class="size-wrapper">
                                            <input type="radio" class="radio-choose" {{$key == 0 ? 'checked' : ''}} id="size{{$size}}" name="size" value="{{$size}}">
                                            <label for="size{{$size}}">{{$size}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @error('size')
                                <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            @if($product->quantity)
                                <div class="detail-product-right-top-btn">
                                    <button type="submit">Thêm vào giỏ hàng</button>
                                    <button>Mua Hàng</button>
                                </div>
                            @endif
                            <h1 style="color: #37ad37; font-size: 17px;">{{session('msg')}}</h1>
                        </div>
                    </form>
                    <div class="detail-product-right-bottom">
                        <div class="detail-product-right-bottom-title">
                            <h3 class="detail-product-right-bottom-title-description">Mô tả sản phẩm</h3>
                        </div>
                        <div class="detail-product-right-bottom-description ">
                            @php
                            $lis = explode('@@',$product->description);
                            @endphp
                            @foreach($lis as $li)
                            <li>{{$li}}</li>
                            @endforeach
                        </div>
                        <hr>
                        <div class="detail-product-right-bottom-promotion" onClick={Icon()}>
                            <div class="detail-product-right-bottom-promotion-title">
                                <i class="fa-solid fa-bullhorn"></i>
                                <span>Khuyến mãi</span>
                            </div>
                            <div class="detail-product-right-bottom-promotion-icon">
                                <i class="fa-solid fa-chevron-down detail-product-right-bottom-icon-down"></i>
                                <i class="fa-solid fa-chevron-up detail-product-right-bottom-icon-up"></i>
                            </div>
                        </div>
                        <div class="detail-product-right-bottom-promotion-information"></div>
                        <div class="detail-product-right-bottom-delivery" onClick={Icon1()}>
                            <div class="detail-product-right-bottom-delivery-title">
                                <i class="fa-solid fa-truck"></i>
                                <span>Vận chuyển, trả hàng</span>
                            </div>
                            <div class="detail-product-right-bottom-delivery-icon">
                                <i class="fa-solid fa-chevron-down detail-product-right-bottom-icon-down"></i>
                                <i class="fa-solid fa-chevron-up detail-product-right-bottom-icon-up"></i>
                            </div>
                        </div>
                        <div class="detail-product-right-bottom-delivery-information">
                            <li><span>Giao hàng tiêu chuẩn</span>: Dự kiến giao hàng từ 2 - 7 ngày làm việc tùy thuộc vào khu vực của khách hàng</li>
                            <li>Tìm hiểu thêm về <span>Đổi trả hàng</span> của chúng tôi</li>
                            <li> Tất cả các đơn đặt hàng hiện đang được vận chuyển từ Việt Nam</li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Icon() {
            var promotion = document.getElementsByClassName(
                "detail-product-right-bottom-promotion"
            )[0];


            promotion.classList.toggle("active");
        }

        function Icon1() {
            var promotion = document.getElementsByClassName(
                "detail-product-right-bottom-delivery"
            )[0];
            promotion.classList.toggle("active1");

        }
    </script>
    @endsection
