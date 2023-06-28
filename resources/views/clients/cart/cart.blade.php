@extends('clients.master-layout')

@section('content')
    <div class="main">
        <form action="{{route('pay')}}" method="post">
            <div class="cart">
                <div class="cart-wrap">
                    <div class="cart-left ">
                        <div class="cart-left-title">
                            <a href="/product"><span>Tiếp tục mua sắm</span></a>
                            <h1>Giỏ hàng</h1>
                        </div>
                        <div class="cart-left-top">
                            <div class="cart-left-top-number" id="cart-left-top-number"> {{$countProducts}} Sản phẩm</div>
                            <div class="cart-left-top-product">Tên sản phẩm</div>
                            <div class="cart-left-top-price"> Giá</div>
                            <div class="cart-left-top-quantity"> Số lượng</div>
                            <div class="cart-left-top-total"> Tổng</div>
                        </div>
                        <div class="cart-left-middle">
                            <div class="cart-left-middle-title">Chọn ngay</div>
                            {{--Cart Item--}}
                            <div id="wrapper-cart-item">
                                {!! $view !!}
                            </div>
                        </div>
                    </div>
                    <div class="cart-right ">
                        <div class="cart-right-top">
                            <div class="cart-right-top-promotion">
                                <input type="text" placeholder="Nhập mã khuyến mãi">
                                <button>Chấp nhận</button>
                            </div>
                        </div>
                        <div class="cart-right-bottom">
                            <div class="cart-right-bottom-title"><span>Thông tin đơn hàng</span></div>
                            <hr>
                            <div class="cart-right-bottom-total"><span>Tổng</span><span id="total-price">0</span></div>
                            <div class="cart-right-bottom-content">
                                <div class="cart-right-bottom-content-delivery">
                                    <select class="cart-right-bottom-content-delivery-content" name= "way_delivery">
                                        <option value="1">Giao hàng tiêu chuẩn (VND 30,000)</option>
                                        <option value="2">Giao hàng nhanh (VND 60,000)</option>
                                    </select>
                                </div>
                                <i class="fa-solid fa-circle-question cart-right-bottom-content-icon"></i>
                            </div>
                            <hr>
                            <div class="cart-right-bottom-total">
                                <h3>Tổng ước tính:</h3>
                                <h3 id="total-price-main">0</h3>
                            </div>
                            @csrf
                            <button type="submit">Mua hàng</button>
                            <hr>
                            <div class="cart-right-bottom-method"><span>Các phương thức thanh toán được xác nhận</span></div>
                            <div class="cart-right-bottom-cod"><span>COD</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function (){
            $(document).on('click', '.btnUpdate', function (){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
                    }
                })
                if($(this).hasClass('btn-minus')){
                    var quantity = $(this).next().val();
                    if(quantity <=1) {
                        alert('Số lượng sản phẩm phải lớn hơn 1');
                        return false;
                    }else{
                        new_qty = parseInt(quantity)-1;
                    }
                }
                if($(this).hasClass('btn-plus')){
                    var quantity = $(this).prev().val();
                    new_qty = parseInt(quantity)+1;
                }

                var cartid = $(this).data('cartid');
                $.ajax({
                    data:{
                        "cartid":cartid,
                        "qty":new_qty
                    },
                    url: '{{route('cart.updateQty')}}',
                    type: 'post',
                    success:function (response){
                        $("#wrapper-cart-item").html(response);
                    },
                    error: function (){
                        alert("Error");
                    }
                })
            })

            $(document).on('click', '#btn-delete-cart-item', function (){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('input[name="_token"]').attr('content')
                    }
                })
                var cartid = $(this).data('cartid');
                $.ajax({
                    data:{
                        "cartid":cartid
                    },
                    url: '{{route('cart.deleteItem')}}',
                    type: 'post',
                    success:function (response){
                        $("#wrapper-cart-item").html(response);
                        $("#cart-left-top-number").html = $("#count-products").val();
                    },
                    error: function (){
                        alert("Error");
                    }
                })
            })

            var totalPrice = 0;

            $(document).on('click', '.btn-choose-cart-item', function (){
                if($(this).is(":checked")){
                    totalPrice = parseInt($(this).next().val());
                } else {
                    totalPrice = parseInt($(this).next().val());
                }
                $("#total-price").html(totalPrice.toLocaleString("vi", {style:"currency", currency:"VND"}));
                $("#total-price-main").html(totalPrice.toLocaleString("vi", {style:"currency", currency:"VND"}));

            })
        });
    </script>
@endsection
