@foreach($itemsCart as $item)
    <input type="hidden" value="{{count($itemsCart)}}" id="count-products">
    <div class="cart-left-middle-product ">
        <div class="wrapper-cart-item-checkbox ">
            <input name="cart_id" type="radio" class="btn-choose-cart-item" value="{{$item->pivot->id}}">
            <input type="hidden" value="{{$item->price * $item->pivot->quantity}}">
        </div>
        <div class="cart-left-middle-product-img">
            <img src="{{asset('cover/'.$item->cover)}}" alt="">
        </div>
        <div class="cart-left-middle-product-information">
            <h3>{{$item->name}}</h3>
            <span>{{$item->pivot->color}}, {{$item->pivot->size}}</span>
            <div class="cart-left-middle-product-information-state">ĐANG CÓ HÀNG</div>
        </div>
        <div class="cart-left-middle-product-price"><span>@money($item->price)</span></div>
        <div class="cart-left-middle-product-quantity">
            <div class="cart-left-middle-product-quantity-content">
                <div class="cart-left-middle-product-quantity-icon">
                    <input type="hidden" name="_token" content="{{csrf_token()}}">
                    <span class="btnUpdate btn-minus" data-cartid="{{$item->pivot->id}}">
                        <i class="fa-solid fa-minus"></i>
                    </span>
                    <input id="input-quantity" class="cart-left-middle-product-quantity-content-number"
                           value="{{$item->pivot->quantity}}">
                    <span class="btnUpdate btn-plus" data-cartid="{{$item->pivot->id}}">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="cart-left-middle-product-number">
            <span>@money($item->price * $item->pivot->quantity)</span>
            <div class="cart-left-middle-product-del">
                <span type="submit" id="btn-delete-cart-item" data-cartid="{{$item->pivot->id}}">
                    <i class="fa-solid fa-trash"></i>
                </span>
            </div>
        </div>
    </div>
@endforeach
