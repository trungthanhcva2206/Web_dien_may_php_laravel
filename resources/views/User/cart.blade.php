<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/cart.css')}}">
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

        <div class="wrapper">
		<h1><span>Shopping Cart</span></h1>
		<div class="project">
			<div class="shop">
				<div class="left-bar">
          @foreach($cartItems as $items)
					<div class="box">
						<div class="image">
						  <img src="{{$items -> attributes->image}}">
            </div>
						<div class="content">
							<h3>{{$items->name}}</h3>
							<h4>{{ number_format($items->price, 0, ',', '.') }} đ</h4>
							<!-- <p class="unit">Quantity: <input name="" value="2"></p> -->
              <div class="quantity-update">
              <form action="{{ route('cart.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $items->id}}">
                <p class="unit" style="display: inline-block;">Quantity:
                <input type="number" name="quantity" value="{{ $items->quantity}}">
                </p>
                <button type="submit" class="btnupdate" style="display: inline-block;">Update</button>
              </form>
              <form action="{{ route('cart.remove')}}" method="post">
                @csrf
                <input type="hidden" value="{{$items -> id}}" name="id">
                <button><p class="btn-area"><i aria-hidden="true" class="fa fa-trash"></i> <span class="btn2">Remove</span></p></button>
              </form>
              </div>
						</div>
					</div>
          @endforeach
				</div>
				
			</div>
			<div class="right-bar">
				<div class="pay">
					<p><span>Quantity Carts:</span> <span>{{Cart::getTotalQuantity()}}</span></p>
					<hr>
					<p><span>Total:</span> <span>{{number_format(Cart::getTotal(), 0, ',', '.')}} đ</span></p><a href="{{ route('payment') }}" class="checkout"><i class="fa fa-shopping-cart"></i>Checkout</a>
          <form action="{{route('cart.clear')}}" method="post" id="clearCartForm">
            @csrf
          </form>
          <button type="button" class="deleteall" style="margin-top:20px;" onclick="confirmDelete()">
            <i class="fa fa-trash"></i>Delete All
          </button>
				</div>
			</div>
		</div>
	</div>




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




	<script src="{{ asset('assets/js/js_admin/cart.js')}}"></script>
  <script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete all items from your cart?')) {
            document.getElementById('clearCartForm').submit();
        }
    }
</script>
</body>
</html>