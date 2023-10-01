@extends('layouts.app')
@section('css')
    <!-- Box-icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/css_user/home.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/smart-home-refrigerator.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/tv.css' rel='stylesheet'>
    @endsection





@section('content')

@if(session('error'))
    <div id="custom-alert" class="alert-popup">
        <div class="alert-content">
            <span>{{ session('error') }}</span>
            <button id="close-button">Close</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var customAlert = document.getElementById("custom-alert");
            var closeButton = document.getElementById("close-button");
            
            closeButton.addEventListener("click", function () {
                customAlert.style.display = "none";
            });
        });
    </script>
@endif







  <section class="menu_content">
    <div class="menu_left">
      <div class="left_main">
        <i class="fa-solid fa-bars"></i>
        <span>MENU</span>
      </div>
      <div class="left_list">
        <ul>
          <li><a href="{{ route('category.products', ['categoryName' => 'All']) }}"><i class="fa-solid fa-check-double"></i> All <div id="muiten"><i class="fa-solid fa-chevron-right"></i></div></a></li>
          @foreach($categories as $category)  
          <li><a href="{{ route('category.products', ['categoryName' => $category->Name]) }}">
          @if( $category->Name == 'Tivi') 
          <img src="https://meta.vn/icons/cats/3256.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Tủ lạnh')
          <img src="https://meta.vn/icons/cats/1015.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Điều hòa')
            <img src="https://meta.vn/icons/cats/1018.png" alt="" style="height:25px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Máy giặt')
          <img src="https://meta.vn/icons/cats/1017.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Máy lọc không khí')
          <img src="https://meta.vn/icons/cats/664.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Bình nóng lạnh')
          <img src="https://meta.vn/icons/cats/757.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Máy hút ẩm')
          <img src="https://meta.vn/icons/cats/622.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @elseif( $category->Name == 'Máy phát điện')
          <img src="https://meta.vn/icons/cats/3145.png" alt="" style="height:23px; margin-right:7px; vertical-align: middle;">
          @else
            <i class="fa-solid fa-globe"></i>
          @endif  
          {{ $category->Name }} 
            
            <div id="muiten"><i class="fa-solid fa-chevron-right"></i></div></a></li>
          @endforeach
        </ul>
        <div class="all_left"><a href=""><a href=""><img  src="https://s.meta.com.vn/img/thumb.ashx/0x0x95/Data/image/2022/03/22/Banner-tu-lanh-970x270.png" alt=""></a></a></div>
      </div>
    </div>
    <div class="menu_right">
      <div class="right_main">
        <div class="right_main_sale">Sản phẩm tốt <i class="fa-solid fa-leaf"></i></div>
      </div>
      <div class="right_slider">
        <div class="slider">
          <div class="slide active">
            <img src="https://s.meta.com.vn/img/thumb.ashx/Data/2023/Thang09/dien-may/Banner-dien-may-720x445.png" alt="">
          </div>
          <div class="slide">
            <img src="https://s.meta.com.vn/img/thumb.ashx/Data/2023/Thang09/Banner-tivi-thong-minh-720x445.png" alt="">
          </div>
          <div class="slide">
            <img src="https://s.meta.com.vn/img/thumb.ashx/Data/2023/Thang08/Banner-dieu-hoa-gree-720x445-a.png" alt="">
          </div>
          <div class="slide">
            <img src="https://s.meta.com.vn/img/thumb.ashx/Data/2023/Thang09/Banner-lo-nuong-720x445.png" alt="">
          </div>
          <div class="slide">
            <img src="https://s.meta.com.vn/img/thumb.ashx/Data/2023/Thang09/Banner-may-pha-ca-phe-720x445.png" alt="">
          </div>
          <div class="navigation">
            <i class="fas fa-chevron-left prev-btn"></i>
            <i class="fas fa-chevron-right next-btn"></i>
          </div>
          <div class="navigation-visibility">
            <div class="slide-icon active"></div>
            <div class="slide-icon"></div>
            <div class="slide-icon"></div>
            <div class="slide-icon"></div>
            <div class="slide-icon"></div>
          </div>
        </div>
        <div class="qc_right">
          <img src="https://s.meta.com.vn/Data/2019/Thang07/tu-lanh-mini-300x250.png" alt="">
          <img src="https://s.meta.com.vn/Data/2022/Thang08/Banner-may-loc-khong-khi-300x250.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="main">
    <div class="content">
      <i class="fa-solid fa-heart"></i>
      <span>Sản phẩm được yêu thích</span>
    </div>
    @foreach ($like_product as $product)
    <div class="prd">
      <a href="{{ route('user.product_detail', ['id' => $product->id]) }}">
        <div class="card">
          <div class="cnt">
            @if ($product->images->count() > 0)
              <img src="./../../../{{ $product->images->first()->img_link }}" alt="">
            @else
              <img src="default_image_url_here" alt="No Image">
            @endif
          </div>
          <div class="container">
            <div class="name"><span>{{ $product->product_name}}</span></div>
            <div class="price"><span>{{ number_format($product->price, 0, ',', '.') }}đ</span> 
            </div>
          </div>
        </div>
        </a>
        <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" value="{{$product->id}}" name="id">
          <input type="hidden" value="{{$product->product_name}}" name="name">
          <input type="hidden" value="{{$product->price}}" name="price">
          <input type="hidden" value="./../../../{{ $product->images->first()->img_link }}" name="image">
          <input type="hidden" value="1" name="quantity">
          <button><a href="#" class="work"><span><i class="fa-solid fa-bag-shopping"></i></span><span class="add"> ADD</span></a></button>
        </form>
    </div>
    @endforeach
    
    <div class="more-prd">
      <a href="{{ route('category.products', ['categoryName' => 'All']) }}"><span>Xem thêm sản phẩm <i class="fa-solid fa-angle-down"></i></span></a>
    </div>
    
  </section>

  <section class="main">
    <div class="content">
      <i class="fa-solid fa-spa"></i>
      <span>Sản phẩm của chúng tôi</span>
    </div>
    @foreach($tree_product as $product)
    <div class="prd">
      <a href="{{ route('user.product_detail', ['id' => $product->id]) }}">
        <div class="card">
          <div class="cnt">
            @if ($product->images->count() > 0)
              <img src="./../../../{{ $product->images->first()->img_link }}" alt="">
            @else
              <img src="default_image_url_here" alt="No Image">
            @endif
          </div>
          <div class="container">
            <div class="name"><span>{{ $product->product_name}}</span></div>
            <div class="price"><span>{{ number_format($product->price, 0, ',', '.') }}đ</span> 
            </div>
          </div>
        </div>
      </a>
      <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <input type="hidden" value="{{$product->id}}" name="id">
          <input type="hidden" value="{{$product->product_name}}" name="name">
          <input type="hidden" value="{{$product->price}}" name="price">
          <input type="hidden" value="./../../../{{ $product->images->first()->img_link }}" name="image">
          <input type="hidden" value="1" name="quantity">
          <button><a href="#" class="work"><span><i class="fa-solid fa-bag-shopping"></i></span><span class="add"> ADD</span></a></button>
        </form>
    </div>
    @endforeach
    <div class="more-prd">
      <a href="{{ route('category.products', ['categoryName' => 'All']) }}"><span>Xem thêm sản phẩm <i class="fa-solid fa-angle-down"></i></span></a>
    </div>
    
  </section>




  <footer>
    <div class="content">
      <div class="top">
        <div class="logo-details details left">
            <i class="fa-solid fa-user-shield"></i>
            <span class="logo_name">Dịch vụ uy tín</span>
        </div>
        <div class="logo-details detail-center">
            <i class="fa-solid fa-repeat"></i>
            <span class="logo_name">Đổi trả hàng trong 7 ngày</span>
        </div>
        <div class="logo-details detail-right">
            <i class="fa-solid fa-truck-fast"></i>
            <span class="logo_name">Giao hàng toàn quốc</span>
        </div>
      </div>
      <div class="link-boxes">
        <ul class="box">
          <li class="link_name">Contact Us</li>
          <li class="info">1st Floor, C5 Building, THUY LOI University 175 TAY SON St, DONG DA Dist, HANOI VIETNAM</li>
          <li class="email">Email: <a href="mailto:techtitan@aptech.vn">techtitan@aptech.vn</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Quản lí tài khoản</li>
          <li><a href="{{ route('user.personal_information') }}">Tài khoản</a></li>
          <li><a href="{{ route('user.my_order') }}">Lịch sử mua hàng</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Công ty</li>
          <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
          <li><a href="{{ route('category.products', ['categoryName' => 'All']) }}">Sản phẩm của chúng tôi</a></li>
        </ul>
        <ul class="box">
          <li class="link_name">Mạng xã hội</li>
          <li class="contact face"><a href="https://www.facebook.com/aptech.vn"><i class="fa-brands fa-facebook"></i></a></li>
          <li class="contact twit"><a href="https://twitter.com/fpt_aptech"><i class="fa-brands fa-square-twitter"></i><span></span></a></li>
          <li class="contact inst"><a href="https://www.instagram.com/aptech.vn/"><i class="fa-brands fa-square-instagram"></i><span></span></a></li>
          <li class="contact yout"><a href="https://www.youtube.com/@AprotrainAptech"><i class="fa-brands fa-square-youtube"></i><span></span></a></li>
        </ul>
      </div>
    </div>
    <div class="bottom-details">
      <div class="bottom_text">
        <span class="copyright_text">Copyright © 2023 <a href="mailto:techtitan@aptech.vn"> techtitan@aptech.vn.</a>Lavarel</span>
        <span class="main_logo">
          <a href=""><h2><i class="fa-solid fa-globe"></i> TECHTITAN</h2></a>
        </span>
      </div>
    </div>
  </footer>

  <script src="{{ asset('assets/js/js_admin/home.js')}}"></script>
  
@endsection