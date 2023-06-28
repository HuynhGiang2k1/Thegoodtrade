<?php
    $categories = \App\Helper\Common::getCategories();
?>
<div class="header">
    <div class="container">
        <div class="header-logo">
            <a href="/"><img src="{{asset('assets/clients/images/logo.png')}}"
                             alt="Fashion" /></a>
        </div>
        <div class="header-menu">
            <div class="header-menu-left">
                <div class="header-menu-left-item">
                    <a href="/">
                        <span class="header-menu-left-item-name underlined"> Trang chủ </span>
                        <div class="header-menu-left-item-icon"></div> </a>
                    <div class="header-menu-left-item-child"></div>
                </div>
                @foreach($categories as $category)
                    <div class="header-menu-left-item">
                        <a href="{{route('products',[$category->name_en])}}">
                            <span class="header-menu-left-item-name underlined">{{$category->name}}</span>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="header-menu-search">
                <input type="search" placeholder="Search..."
                />
                <div class="header-menu-search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <div class="header-menu-right">
                @cannot('is_login')
                    <div>
                        <a href="{{route('showform-login')}}" class="header-menu-right-account">Đăng nhập</a>
                        <a href="{{route('showform-register')}}" class="header-menu-right-account">Đăng ký</a>
                    </div>
                @endcannot
                @can('is_login')
                    <div class="header-menu-right-avatar">
                        @if(isset(\Illuminate\Support\Facades\Auth::user()->avatar))
                            <img src="{{asset('avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="" />
                        @else
                            <img src="{{asset('assets/clients/images/noavatar.jpg')}}" alt="">
                        @endif
                    </div>
                    <div class="header-menu-right-icon">
                        <a href="/cart"><i class="fa-solid fa-cart-shopping"></i>
                        {{\Illuminate\Support\Facades\DB::table('carts')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->count()}}
                        </a>
                    </div>
                    <div class="header-menu-right-menu-wrap
                        header-menu-left-item-child">
                        <div class="header-menu-right-menu">
                            <div class="header-menu-right-menu-user">
                                @if(isset(\Illuminate\Support\Facades\Auth::user()->avatar))
                                    <img src="{{asset('avatar/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}" alt="" />
                                @else
                                    <img src="{{asset('assets/clients/images/noavatar.jpg')}}" alt="">
                                @endif
                                <h2>{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                            </div>
                            <hr />
                            <div>
                                <a href="/my">
                                    <div class="header-menu-right-menu-icon">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <span> Trang của tôi </span>
                                </a>
                            </div>
                            <div>
                                <a href="/">
                                    <div class="header-menu-right-menu-icon">
                                        <i class="fa-solid fa-gear"></i>
                                    </div>
                                    <span> Cài đặt &amp; riêng tư </span>
                                </a>
                            </div>
                            <div>
                                <a href="/">
                                    <div
                                        class="header-menu-right-menu-icon">
                                        <i class="fa-solid
                                       fa-question"></i>
                                    </div>
                                    <span> Trợ giúp &amp; hổ trợ </span>
                                </a>
                            </div>
                            <div>
                                <a href="{{route('logout')}}">
                                    <div
                                        class="header-menu-right-menu-icon">
                                        <i class="fa-solid
                                       fa-right-from-bracket"></i>
                                    </div>
                                    <span> Đăng xuất </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
