@extends('clients.master-layout')

@section('content')

    <div class="main">
        <div class="slide-images">
            <div class="slide-images-content">
                <img src="{{asset('assets/clients/images/header/slideshow_1.jpg')}}" class="slide-images-item"/>
                <img
                    src="{{asset('assets/clients/images/header/slideshow_2.jpg')}}" class="slide-images-item"
                />
                <img
                    src="{{asset('assets/clients/images/header/slideshow_3.jpg')}}" class="slide-images-item"
                />
                <img
                    src="{{asset('assets/clients/images/header/slideshow_4.jpg')}}" class="slide-images-item"
                />
                <img
                    src="{{asset('assets/clients/images/header/slideshow_5.jpg')}}" class="slide-images-item"
                />
            </div>
        </div>
        <div class="header-product-new grid ">
            <h1>WHAT'S NEW</h1>
            <div class="container col ">
                <a href="/giay ">
                    <div class="new-product-item c-o-1 ">
                        <img src="{{asset('assets/clients/images/products/productNew/Giay.jpg')}}" alt=" " />
                        <span>Giày</span>
                    </div>
                </a>
                <a href="/tui ">
                    <div class="new-product-item c-o-1 ">
                        <img src="{{asset('assets/clients/images/products/productNew/Tui.jpg')}}" alt=" " />
                        <span>Túi</span>
                    </div>
                </a>
                <a href="/vi ">
                    <div class="new-product-item c-o-1 ">
                        <img src="{{asset('assets/clients/images/products/productNew/Vi.jpg')}}" alt=" " />
                        <span>Ví</span>
                    </div>
                </a>
                <a href="/kinhmat ">
                    <div class="new-product-item c-o-1 ">
                        <img src="{{asset('assets/clients/images/products/productNew/Kinh.jpg')}}" alt=" " />
                        <span>Kính mát</span>
                    </div>
                </a>
                <a href="/trangsuc ">
                    <div class="new-product-item c-o-1 ">
                        <img src="{{asset('assets/clients/images/products/productNew/TrangSuc.jpg')}}" alt=" " />
                        <span>Trang sức</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
        chat-title="NewAgent"
        agent-id="ac3e4e59-1b46-4fb7-9582-2de34f33259a"
        language-code="vi"
    ></df-messenger>
    <script >


        let slideIndex = 0;
        showSlide(slideIndex);

        showSlide();

        function showSlide() {
            let i;
            var imgs = document.getElementsByClassName("slide-images-item");
            for( i = 0 ; i < imgs.length ; i++){
                imgs[i].style.display = 'none';
            }
            slideIndex++;
            if(slideIndex > imgs.length){
                slideIndex = 1;
            }
            if(slideIndex < 1){
                slideIndex = imgs.length
            }

            imgs[slideIndex - 1].style.display = 'block';

            setTimeout(showSlide, 3000);
        }
    </script>
@endsection
