@extends('layouts.app')
@section('css')
    <!-- Box-icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/small.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @endsection

@section('small_menu')
  <div id="select_menu" class="mnsl">
    <div class="menunow">
      <div class="mn"><span>MENU</span></div>
      <div class="product_menu">
        <ul>
          <li><a href="{{ route('category.products', ['categoryName' => 'All']) }}"><i class="fa-solid fa-check-double"></i> Tất cả sản phẩm</a></li>
          @foreach($categories as $category)  
          <li><a href="{{ route('category.products', ['categoryName' => $category->Name]) }}"><span>{{ $category->Name }}</span> <i class="fa-solid fa-angle-down"></i></a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="out" id="outl"><div class="close"><span>Click here to close</span></div></div>
  </div>
  @endsection
    @section('content')
    <section class="image_bar">
      <div class="chinh">
        <div class="image"><img src="http://getwallpapers.com/wallpaper/full/2/1/8/1058882-download-zen-garden-wallpaper-1920x1080-for-iphone.jpg" alt=""></div>
        <div class="bar_img">
          <span>Chúng tôi tự hào giới thiệu đến bạn một thế giới của sự tiện lợi và công nghệ hiện đại. Tại đây, bạn sẽ khám phá một loạt sản phẩm điện máy đa dạng, từ các thiết bị gia dụng thông minh, điều hòa không khí, máy giặt đến các sản phẩm điện tử, tất cả đều được chọn lọc cẩn thận để đảm bảo chất lượng và hiệu suất tốt nhất.</span>
        </div>
      </div>
    </section>

    <section class="main">
      <div class="content">
        <span class="home">Trang chủ<span class="xs">>></span></span><span>{{ $categoryName }}</span>
        <a href="" id="showmenu" class="menu_show"><span><i class="fa-solid fa-bars"></i>SELECT MENU</span></a>
      </div>
      @foreach ($products as $product)
      <div class="prd">
        <a href="{{ route('user.product_detail', ['id' => $product->id]) }}">
          <div class="card">
            <div class="cnt">
                <img src="./../../../{{ $product->images->first()->img_link }}" alt="">
            </div>
            <div class="container">
              <div class="name"><span>{{ $product->product_name }}</span></div>
              <div class="price"><span>{{ number_format($product->price, 0, ',', '.') }} đ</span> 
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
          <a href=""><h2><i class="fa-solid fa-globe"></i>  TECHTITAN</h2></a>
        </span>
      </div>
    </div>
  </footer>

    <script src="{{ asset('assets/js/js_admin/small.js')}}"></script>
    @endsection