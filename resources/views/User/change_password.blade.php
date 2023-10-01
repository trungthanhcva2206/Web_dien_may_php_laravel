<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/css_user/navlord.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/css_user/footer.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/my_oder.css')}}">
    <style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .changePassword {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .changePassword:hover {
        background-color: #0056b3;
    }
</style>

	

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

		<main>
			<div class="breadcrumb">
				<ul>
					<li><a href="{{ route('user.home_page') }}">Home</a></li>
					<li> / </li>
					<li><a href="{{ route('user.personal_information') }}">Account</a></li>
					<li> / </li>
					<li>Change Password</li>
				</ul>
			</div> <!-- End of Breadcrumb-->

			
			<div class="account-page">
				<div class="profile">
					<div class="profile-img">
						<img src="{{$user -> img_link}}">
						<h2>{{$user -> name}}</h2>
						<p>{{$user -> email}}</p>
					</div>						
					<ul>
						<li><a href="{{ route('user.personal_information') }}">Tài khoản <span>></span></a></li>
						<li><a href="{{ route('user.my_order') }}">Lịch sử mua hàng <span>></span></a></li>
						<li><a href="{{ route('user.change_password') }}" class="active">Đổi mật khẩu <span>></span></a></li>
						<li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-decoration:none">Đăng xuất <span>></span></a></li>
					</ul>
				</div>
                <div class="account-detail">
					<h2>Change password</h2>
					<div class="billing-detail">					
                    <div class="card-body">

                    <form method="POST" action="{{ route('update_password') }}" id="change_password_form">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Current Password</label>
                            <input type="password" id="old_password" name="old_password" class="form-control">

                            @if($errors->any('old_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('old_password')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control">
                            @if($errors->any('new_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('new_password')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                            @if($errors->any('confirm_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('confirm_password')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>	
					</div>
				</div>
			</div>		
		</main>
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
	</div>	
	<script src="{{ asset('assets/js/js_admin/nav.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $('#change_password_form').validate({
            ignore:'.ignore',
            errorClass:'invalid',
            validClass:'success',
            rules:{
                old_password:{
                    required:true,
                    minlength:6,
                    maxlength:100
                },
                new_password:{
                    required:true,
                    minlength:6,
                    maxlength:100
                },
                confirm_password:{
                    required:true,
                    equalTo:'#new_password'
                },
            },
            messages: {
                old_password:{
                    required:"Enter your current password"
                },
                new_password:{
                    required:"Enter your new password"
                },
                confirm_password:{
                    required:"Need to confirm your new password"
                },
            },

            submitHandler:function(form){
                $.LoadingOverLay("show");
                form.submit();
            }
        })
    </script>
</body>
</html>

