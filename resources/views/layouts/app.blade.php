<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
     <!-- Box-icon -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/css_user/home.css')}}"> -->
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Scripts -->
    @vite([ 'resources/js/app.js'])
    @yield('css')
</head>
<body>
    <div id="app">
    @yield('small_menu')
        <nav class="navbar">
            <div class="container">
                <a class="name_web" href="{{ route('user.home_page') }}">
                    <h2><i class="fa-solid fa-globe"></i>  TECHTITAN</h2>
                </a>
                
      <div class="content">
        <a href="{{ route('cart.list') }}" class="cart"><i class="fa-solid fa-basket-shopping"></i><span class="my-content"> Giỏ hàng</span> {{Cart::getTotalQuantity()}}</a>
        <div class="dropdown-hotline">
          <a href="{{ route('user.contact_us')}}" class="hotline"><i class="fa-solid fa-phone-volume"></i><span class="my-content"> ContactUs</span></a>
          <div class="hotl-btn">
            <a href="mailto:techtitan@aptech.vn"><span><i class="fa-regular fa-envelope"></i> Email : <span class="inf-btn">techtitan@aptech.vn</span></span></a>
            <a href="#"><span><i class="fa-regular fa-clock"></i> Time : <span class="inf-btn">8h00 - 19h00</span></span></a>
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
                                    <a href="{{ route('user.personal_information') }}"><span>Tài khoản</span></a>
                                    <a href="{{ route('user.my_order') }}"><span>Lịch sử mua hàng</span></a>
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/js_admin/nav.js')}}"></script>
</body>
</html>
