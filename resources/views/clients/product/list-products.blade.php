@php
    $colors = [
        'Đen' => 'linear-gradient(#666666, #000000)',
        'Xanh Blue' => 'linear-gradient(#b3ccff, #001a4d)',
        'Nâu' => 'linear-gradient(#ffd9b3, #4d1300)',
        'Xanh lá' => 'linear-gradient(#d6ffd9, #006007)',
        'Xám' => 'linear-gradient(#fcfcfc, #666666)',
        'Ánh kim' => '',
        'Nhiều màu' => 'linear-gradient(#ff0000, #ffa500, #ffff00, #00ff00, #0000ff, #4b0082, #ee82ee',
        'Trung tính' => 'linear-gradient(#ffffff, #d99a6c)',
        'Cam' => 'linear-gradient(#ffd9b3, #ff4000)',
        'Hồng' => 'linear-gradient(#ffcce6, #f00078)',
        'Tím' => 'linear-gradient(#ffccff, #660066',
        'Đỏ' => 'linear-gradient(#ff9999, #b70000)',
        'Trắng' => 'linear-gradient(#ffffff, #f0f0f0)',
        'Vàng' => 'linear-gradient(#fff5cc, #ffcc00'
    ];
@endphp
@foreach($products as $product)
    <div class="product-wrap col l-4 m-12 c-12">
        <a href="{{route('product.detail', [$product])}}">
            <div class="product-item">
                <div class="swiper swiper-slide">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide product-item-img">
                            <img src="{{asset('cover/'.$product->cover)}}" />
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <div
                    class="product-item-description"><span>{{$product->name}}</span><span>@money($product->price)</span>
                </div>
                <div
                    class="product-item-options">
                    <div class="product-item-options-colors">
                        @php
                            $listcolors = explode('@@', $product->colors);
                        @endphp
                        @foreach($listcolors as $color)
                            <span>
                                <button style="background:{{$colors[$color]}}"></button>
                            </span>
                        @endforeach
                    </div>
                    <div
                        class="product-item-options-sizes">
                        <div class="swiper swiper-size">
                            <div class="swiper-wrapper">
                                @php
                                    $listsizes = explode('@@', $product->sizes);
                                @endphp
                                <div class="swiper-slide product-item-options-sizes-item">
                                    @foreach($listsizes as $key => $size)
                                        @php
                                            if($key>3) break;
                                        @endphp
                                        <span>{{$size}}</span>
                                    @endforeach
                                </div>
                                @if(count($listsizes)>4)
                                    <div class="swiper-slide product-item-options-sizes-item">
                                        @for($i=4; $i< count($listsizes); $i++)
                                            <span>{{$listsizes[$i]}}</span>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="product-item-options-button">
                        @if($product->quantity)
                            <span>@money($product->price)</span>
                        @else
                            <span style="color: red">Đã hết hàng</span>
                        @endif
                        <button>Xem sản phẩm</button>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
