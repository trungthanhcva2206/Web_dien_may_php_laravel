<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/about.css')}}">
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
        <section class="main">
        <div class="about">
            <div class="information">
                <div class="left">
                    <div class="top">
                        <span>
                          Giới thiệu công ty
                        </span>
                    </div>
                    <div class="bot">
                        <span>
                          Trong những năm qua, xã hội phát triển, kinh tế tăng trưởng đồng thời là chất lượng cuộc 
                          sống của người dân ngày càng càng được nâng cao nhiều trung tâm thương mại, nhà cao tầng, 
                          biệt thự được mọc ra kèm theo đấy là nhu cầu mua sắm các thiết bị phục vụ nhu cầu cuộc sống 
                          hàng ngày như TV, Tủ lạnh, Điện gia dụng... Techtitan khai trương Siêu thị điện máy số 1 Hà Nội 
                          chính thức tham gia vào lĩnh vực kinh doanh bán lẻ điện máy, tạo ra một phong cách mua sắm 
                          hoàn toàn mới với người dân thủ đô, thông qua cung cấp các sản phẩm và dịch vụ tới người tiêu dùng.
                        </span>
                    </div>
                </div>
            </div>
            <div class="demo">
              <i class="fa-brands fa-shopify"></i> <br>
              <span>Các chương trình khuyến mãi được tổ chức thường xuyên có mức giá rẻ hơn rất nhiều so với giá thị trường và giá niêm yết.</span>
            </div>
            <div class="best">
              <div class="content">
                <div class="left">
                  <div class="top">
                    <span>
                      1.Những Mục Tiêu Tương Lai
                    </span>
                  </div>
                  <div class="bot">
                    <span>
                      Không ngừng vươn xa, Techtitan sẽ mở rộng Hệ thống siêu thị điện máy - nội thất tới các Tỉnh thành trong cả nước với tiêu chí phát triển, hiệu quả, bền vững. Sự gia tăng mạnh mẽ cả về nguồn vốn, mô hình và mạng lưới hoạt động cũng như chất lượng nguồn nhân lực không chỉ thể hiện những khởi sắc mà còn là dấu ấn quan trọng trong hoạt động kinh doanh của Techtitan.
                    </span>
                  </div>
                  <div class="anh">
                    <img src="https://topsaigon.vn/upload/data/images/dienmayxanh-1.jpg" alt="">
                  </div>
                  <div class="bot">
                    <span>
                      Đón đầu và phát huy lợi thế từ mọi cơ hội, Techtitan không ngừng nghiên cứu, phát triển thêm các sản phẩm, dịch vụ gia tăng đáp ứng hiệu quả mọi nhu cầu của khách hàng như bán hàng Online, Call Center, Dịch vụ bảo hành trọn đời, Bán hàng trả góp lãi suất 0%... Cùng với sự đa dạng hóa sản phẩm dịch vụ, Techtitan cũng đã hoàn thiện những quy trình quản trị, quy trình điều hành, quản lý rủi ro, không ngừng nghiên cứu, học hỏi từ những mô hình Điện máy thành công trên thế giới để áp dụng một cách sáng tạo, khoa học vào kinh doanh của Techtitan, đảm bảo hiệu quả cũng như sự phát triển bền vững cả trong hiện tại lẫn những chặng đường về sau.
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="demo">
              <i class="fa-solid fa-truck-fast"></i> <br>
              <span>Techtitan giao hàng toàn quốc tại 63 tỉnh thành. Dù khách hàng ở xa hay gần, khi có nhu cầu mua sản phẩm thì sẽ giao hàng tới tận nơi cho khách hàng.</span>
            </div>
            <div class="best">
              <div class="content">
                <div class="left">
                  <div class="top">
                    <span>
                      2.Thế Mạnh Và Định Hướng Của Công Ty
                    </span>
                  </div>
                  <div class="bot">
                    <span>
                      Với kim chỉ nam là “Không ngừng phát triển vì khách hàng”, Techtitan đã 
                      quy tụ được Ban Lãnh đạo có bề dày kinh nghiệm trong các lĩnh vực điện máy 
                      không chỉ mạnh về kinh doanh mà còn mạnh về công nghệ có nhiều tiềm năng phát 
                      triển, kết hợp với đội ngũ nhân viên trẻ, năng động và chuyên nghiệp tạo lên 
                      thế mạnh nòng cốt của công ty để thực hiện tốt các mục tiêu đề ra. Hơn nữa, trên 
                      cơ sở nguồn lực của công ty và nhu cầu của xã hội, Techtitan lựa chọn phát triển 
                      kinh doanh các sản phẩm Điện máy, IT, Các sản phẩm công nghệ, nội thất ...phục vụ nhu 
                      cầu thiết yếu của người dân với các sản phẩm đa dạng phong phú mang lại giá trị gia 
                      tăng cho người tiêu dùng thông qua các dịch vụ sau bán hàng. Qua quá trình phát triển, 
                      bên cạnh việc thiết lập được một hệ thống đối tác nước trong nước và ngoài đến từ các 
                      doanh nghiệp lớn của Korea, Singapore, Trung Quốc, Nhật Bản, có thế mạnh trong các lĩnh 
                      vực Điện máy, sản phẩm công nghệ như: SAMSUNG, SONY, LG, Panasonic, Toshiba, Sharp,... 
                      Trong thời gian tới Công ty sẽ đầu tư vào các ngành nghề mới như bất động sản, khai thác khoáng, đầu tư tài chính.
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="demo">
              <img src="http://cdn.onlinewebfonts.com/svg/img_343651.png" alt=""> <br>
              <span>Tất cả các sản phẩm được bán tại Techtitan đều là hàng chính hãng của thương hiệu nổi tiếng hàng đầu thế giới</span>
            </div>
            <div class="best">
              <div class="content">
                <div class="left">
                  <div class="top">
                    <span>
                      3.Đội Ngũ Nhân Sự
                    </span>
                  </div>
                  <div class="bot">
                    <span>
                      Hội đồng Quản trị do Đại hội đồng cổ đông tín nhiệm bầu ra. Hội đồng quản trị là cơ quan
                      quản trị toàn bộ mọi hoạt động của công ty, các chiến lược, kế hoạch sản xuất và kinh 
                      doanh trong nhiệm kỳ của mình. Ban Giám đốc sẽ chịu trách nhiệm về các mặt hoạt động 
                      của công ty trước Hội đồng Quản trị và pháp luật hiện hành, quyết định các chủ trương,
                      chính sách, mục tiêu chiến lược của công ty, đồng thời giám sát và kiểm tra tất cả các 
                      hoạt động về sản xuất kinh doanh, đầu tư của công ty.
                    </span>
                  </div>
                  <div class="nvien">
                    <span><i class="fa-brands fa-themeco"></i> Nguyễn Trường An</span><br>
                    <span><i class="fa-brands fa-themeco"></i> Lê Đoàn Dương</span><br>
                    <span><i class="fa-brands fa-themeco"></i> Nguyễn Lê Trung Thành</span><br>
                    <span><i class="fa-brands fa-themeco"></i> Đinh Quốc Việt</span><br>
                  </div>
                </div>
              </div>
            </div>
            <div class="demo">
              <img src="https://file.hstatic.net/1000377637/file/logistic-package-policy-product-return-icon-product-return-png-512_512_5ef8a4d35a7c4ef2887b76045bf73e23.png" alt=""> <br>
              <span>Đổi - Trả hàng là một trong số những chính sách đảm bảo quyền lợi của khách hàng. Trong vòng 07 ngày khách hàng sẽ được đổi mới sản phẩm</span>
            </div>
            <div class="best">
              <div class="content">
                <div class="left">
                  <div class="top">
                    <span>
                      4.Cam Kết
                    </span>
                  </div>
                  <div class="bot">
                    <span>
                      Techtitan nỗ lực hướng tới mục tiêu phát triển bền vững và trở thành thương hiệu hàng đầu về cung cấp các sản phẩm Điện máy - Nội thất tại Việt Nam mang tầm cỡ quốc tế. Dựa vào nội lực của chính mình và mở rộng hợp tác với các đối tác trong và ngoài nước chúng tôi cam kết. <br>
                      <h3>Cam kết với đối tác:</h3>
                      - Trở thành đối tác chiến lược trong và ngoài nước trên cơ sở "Hợp tác, phát triển bền vững" hợp tác toàn diện lâu dài nhằm kịp thời đưa những sản phẩm mới và dịch vụ theo các yêu cầu đặc thù của khách hàng. <br>
                      <h3>Cam kết với khách hàng :</h3>
                      - Luôn luôn làm khách hàng hài lòng về các sản phẩm và dịch vụ do Techtitan cung cấp. Sự thành công hài lòng của khách hàng là thước đo uy tín hiệu quả của doanh nghiệp.<br>
                      - Giá cả hàng hóa luôn hợp lý và được cập nhật chính xác, kịp thời để phục vụ khách hàng tối đa. <br>
                      - Luôn lắng nghe, phân tích và học hỏi từ thị trường trong và ngoài nước, không bao giờ tự mãn với thành công đã có. <br>
                      - Luôn nhìn lại mình để phát triển (đạo đức và kiến thức chuyên môn). Mỗi nhân viên là một thương hiệu cá nhân. Mỗi nhân viên là một đại sứ thiện chí của Techtitan đối với thế giới bên ngoài.<br> 
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="demo">
              <img src="https://cdn-icons-png.flaticon.com/512/906/906246.png" alt=""> <br>
              <span>Với đội ngũ nhân viên được đào tạo bải bản, chuyên nghiệp sẽ giúp khách hàng hoàn toàn an tâm khi tham quan và mua sắm</span>
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

    <script src="{{ asset('assets/js/js_admin/about.js')}}"></script>
</body>
</html>

