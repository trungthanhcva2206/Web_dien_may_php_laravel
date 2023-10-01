<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/payment.css')}}">
     <!-- Box-icon -->
	 <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/css_user/navlord.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/css_user/footer.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="container">
<nav class="navbard">
        <div class="containerd">
        <a class="name_web" href="{{ route('user.home_page') }}"><h2 class="h2n"><i class="fa-solid fa-globe"></i> TECHTITAN</h2></a>
        <div class="contentd">
            <a href="{{ route('cart.list') }}" class="cart"><i class="fa-solid fa-basket-shopping"></i><span class="my-content"> Giỏ hàng</span> {{Cart::getTotalQuantity()}}</a>
            <div class="dropdown-hotline">
            <a href="{{ route('user.contact_us')}}" class="hotline"><i class="fa-solid fa-phone-volume"></i><span class="my-content"> ContactUs</span></a>
            <div class="hotl-btn">
                <a href="mailto:techtitan@aptech.vn" class="em"><span><i class="fa-regular fa-envelope"></i> Email : <span class="inf-btn">techtitan@aptech.vn</span></span></a>
                <a href="#" class="time"><span><i class="fa-regular fa-clock"></i> Time : <span class="inf-btn">8h00 - 19h00</span></span></a>
            </div>
            </div>
            @guest
                            @if (Route::has('login'))
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                
                            @endif

                            @if (Route::has('register'))

                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            
                            <div class="dropdown-account">
                                <a  class="account" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="acc-btn">
                                    <a href="{{ route('user.personal_information') }}" style="text-decoration:none"><span>Tài khoản</span></a>
                                    <a href="{{ route('user.my_order') }}" style="text-decoration:none"><span>Lịch sử mua hàng</span></a>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-decoration:none">
                                        <span>{{ __('Đăng xuất') }}</span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </div>
                            </div>
                                
                        @endguest 
                    </ul>
                </div>
            </div>
        </nav>

        <section class="payment">
      <div class="pay_prd">
        <h3>List Carts</h3>
        @foreach($cartItems as $items)
        <div class="product">
          <img src="{{$items -> attributes->image}}" alt="">
          <div class="content">
            <span class="name">{{$items->name}}</span>
            <br>
            <span class="quantity">Quantity : <span class="qtt">{{ $items->quantity}}</span></span>
          </div>
        </div>
        @endforeach
      </div>
      <div class="pay_form">
        <div class="left">
          <h3>BILLING ADDRESS</h3>
          <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <span><i class="fa-solid fa-signature"></i> Full name</span>
            <input type="text" value="{{ $user->name }}" name="name" placeholder="Enter name" required>

            <span><i class="fa-solid fa-envelope"></i> Email</span>
            <input type="text" value="{{ $user->email }}" name="email" placeholder="Enter email" required>
    
            <span><i class="fa-solid fa-map-location-dot"></i> Address</span>
            <input type="text" value="{{ $user->address }}" name="address" placeholder="Enter address" required>
            
            <span><i class="fa-solid fa-mobile-screen-button"></i> Phone</span>
            <input type="text" minlength="10" maxlength="10" value="{{ $user->phone}}" name="phone" placeholder="Enter your phone" required>
            <input type="hidden" name="total_pay" value="{{Cart::getTotal()}}">
        </div>
        <div class="right">
          <h3>ORDER NOW</h3>
            <div class="prd_order"><span><i class="fa-solid fa-basket-shopping"></i> Quantity order : </span><span class="chan">{{Cart::getTotalQuantity()}}</span></div>
            <div class="price_order"><i class="fa-solid fa-money-check-dollar"></i><span> Amount order : </span><span class="chan" name=""> {{number_format(Cart::getTotal(), 0, ',', '.')}} đ</span></div>
                <button type="submit" class="deleteall" >Proceed to Order</button>
          </form>
        </div>
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




	<script>
        window.addEventListener("scroll", function() {
	var navbar = document.querySelector(".navbar");
    var search_bar = document.querySelector(".search-bar");
    var acc_btn = document.querySelector(".acc-btn");
    var hotl_btn = document.querySelector(".hotl-btn");
	if (window.scrollY > 0) {
	  navbar.classList.add("small");
      search_bar.classList.add("small");
      acc_btn.classList.add("small");
      hotl_btn.classList.add("small");
	} else {
	  navbar.classList.remove("small");
      search_bar.classList.remove("small");
      acc_btn.classList.remove("small");
      hotl_btn.classList.remove("small");
	}
  });


    </script>
    
</body>
</html>