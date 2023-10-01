<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Box-icon -->
	 <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/css_user/navlord.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/css/css_user/footer.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_user/product_detail.css')}}">
<style>
        /* Thay đổi màu sắc của sao đã chọn */
        .fa-star.checked {
            color: gold;
        }
    </style>
</head>
<body>
<nav class="navbard">
        <div class="containerd">
        <a class="name_web" href="{{ route('user.home_page') }}"><h2 class="h2n"><i class="fa-solid fa-globe"></i>  TECHTITAN</h2></a>
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
    <div class="container">
    <div class="heading-section">
        <h2>Product Details</h2>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div id="slider" class="owl-carousel product-slider">
            @foreach ($product->images as $image)
                <div class="item">
                <img src="./../../../{{ $image->img_link }}" alt="Product Image">
                </div>
            @endforeach
            </div>
            <div id="thumb" class="owl-carousel product-thumb">
            @foreach ($product->images as $image)
                <div class="item">
                <img src="./../../../{{ $image->img_link }}" alt="Product Image">
                </div>
            @endforeach
            </div>            
        </div>
        <div class="col-md-6">
            <div class="product-dtl">
                <div class="product-info">
                    <div class="product-name">{{ $product->product_name}}</div>
                    <div class="reviews-counter">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" {{ $averageRating == 5 ? 'checked' : '' }} />
                            <label for="star5" title="5 stars">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" {{ $averageRating == 4 ? 'checked' : '' }} />
                            <label for="star4" title="4 stars">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" {{ $averageRating == 3 ? 'checked' : '' }} />
                            <label for="star3" title="3 stars">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" {{ $averageRating == 2 ? 'checked' : '' }} />
                            <label for="star2" title="2 stars">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" {{ $averageRating == 1 ? 'checked' : '' }} />
                            <label for="star1" title="1 star">1 star</label>
                        </div>
                        <span>{{$reviewCount}} Reviews</span>
                    </div>
                </div>

                <div class="product-price-discount"><span>{{ number_format($product->price, 0, ',', '.') }} đ</span>
                </div>
            </div>
            <p style="font-weight: bold;">{{ $product -> description}}</p>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label style="color: green; font-weight:bold">Tình trạng:</label> 
                        @if($product->quantity == 0)
                            Hết hàng
                        
                        @else
                            Còn hàng
                        @endif

                    </div>
                </div>
            </div>
            <div class="product-count">
                <label for="size" style="font-weight: bold;">Số lượng:</label>
                <form action="#" class="display-flex">
                    <div class="qtyminus">-</div>
                    <input type="text" id="quantityInput" name="quantity" value="1" class="qty">
                    <div class="qtyplus">+</div>
                </form>
                <div class="add-product">
                <form action="{{route('cart.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <input type="hidden" value="{{$product->product_name}}" name="name">
                    <input type="hidden" value="{{$product->price}}" name="price">
                    <input type="hidden" value="{{ $product->images->first()->img_link }}" name="image">
                    <input type="hidden" id="hiddenQuantity" value="1" name="quantity">
                    <button class="round-black-btn add-to-cart-btn" style="cursor: pointer;"><span>Thêm giỏ hàng<span></button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-info-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Mô tả sản phẩm</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Bình luận ({{$dembinhluan}})</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <table class="product-table">
                @foreach($attributeValues as $attributeValue)
                <tr>
                    <th>{{ $attributeValue->attribute->attribute_name }}</th>
                    <td>{{ $attributeValue->value }}</td>
                </tr>
                @endforeach
            </table>










        </div>
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="review-heading">Bình luận</div>
            <!-- <p class="mb-20">There are no reviews yet.</p> -->
            <div class="user-comments">
            @foreach($comments as $comment)
    @if ($comment->comment)
        <div class="comment">
            <div class="comment-user">
                <span class="user-name">{{$comment -> user -> name}}</span>
                <div class="rate">
                    <input type="radio" id="star5-{{$comment->id}}" name="rate-{{$comment->id}}" value="5" {{ $comment->star == 5 ? 'checked' : '' }} />
                    <label for="star5-{{$comment->id}}" title="5 stars">5 stars</label>
                    <input type="radio" id="star4-{{$comment->id}}" name="rate-{{$comment->id}}" value="4" {{ $comment->star == 4 ? 'checked' : '' }} />
                    <label for="star4-{{$comment->id}}" title="4 stars">4 stars</label>
                    <input type="radio" id="star3-{{$comment->id}}" name="rate-{{$comment->id}}" value="3" {{ $comment->star == 3 ? 'checked' : '' }} />
                    <label for="star3-{{$comment->id}}" title="3 stars">3 stars</label>
                    <input type="radio" id="star2-{{$comment->id}}" name="rate-{{$comment->id}}" value="2" {{ $comment->star == 2 ? 'checked' : '' }} />
                    <label for="star2-{{$comment->id}}" title="2 stars">2 stars</label>
                    <input type="radio" id="star1-{{$comment->id}}" name="rate-{{$comment->id}}" value="1" {{ $comment->star == 1 ? 'checked' : '' }} />
                    <label for="star1-{{$comment->id}}" title="1 star">1 star</label>
                </div>
                <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="comment-content">
                <p style="font-weight: bold;">{{$comment->comment}}</p>
            </div>
        </div>
    @endif
@endforeach

            </div>
            <form class="review-form" method="POST" action="{{ route('comment.store')}}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label>Your rating</label>
                    <div class="reviews-counter">
                        <div class="rating">
                            <span class="fa fa-star" data-rating="1"></span>
                            <span class="fa fa-star" data-rating="2"></span>
                            <span class="fa fa-star" data-rating="3"></span>
                            <span class="fa fa-star" data-rating="4"></span>
                            <span class="fa fa-star" data-rating="5"></span>
                            <input type="hidden" name="rating" id="rating" value="0">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Your message</label>
                    <textarea class="form-control" name="message" rows="10"></textarea>
                </div>

                <button type="submit" class="round-black-btn">Submit Review</button>
            </form>

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
          <a href=""><h2><i class="fa-solid fa-globe"></i>  TECHTITAN</h2></a>
        </span>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="{{ asset('assets/js/js_user/product_detail.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/nav.js')}}"></script>
<script>
		$(document).ready(function () {
    var slider = $("#slider");
    var thumb = $("#thumb");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    slider.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200
    }).on('changed.owl.carousel', syncPosition);

    thumb.on('initialized.owl.carousel', function () {
        thumb.find(".owl-item").eq(0).addClass("current");
    }).owlCarousel({
        items: slidesPerPage,
        dots: false,
        nav: true,
        item: 4,
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: slidesPerPage,
        navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        responsiveRefreshRate: 100
    }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        thumb
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = thumb.find('.owl-item.active').length - 1;
        var start = thumb.find('.owl-item.active').first().index();
        var end = thumb.find('.owl-item.active').last().index();
        if (current > end) {
            thumb.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            thumb.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            slider.data('owl.carousel').to(number, 100, true);
        }
    }

    // Lắng nghe sự kiện click cho nút cộng
    $(".qtyplus").on("click", function () {
        var currentQuantity = parseInt($(".qty").val());
        if (!isNaN(currentQuantity)) {
            // Tăng số lượng lên 1 và cập nhật giá trị vào input
            var newQuantity = currentQuantity + 1;
            $(".qty").val(newQuantity);

            // Cập nhật giá trị vào hidden input
            document.getElementById("hiddenQuantity").value = newQuantity;
        }
    });

    // Tương tự, bạn có thể thêm lắng nghe sự kiện click cho nút trừ (qtyminus) để giảm số lượng.
    $(".qtyminus").on("click", function () {
        var currentQuantity = parseInt($(".qty").val());
        if (!isNaN(currentQuantity) && currentQuantity > 1) {
            // Giảm số lượng đi 1 và cập nhật giá trị vào input
            var newQuantity = currentQuantity - 1;
            $(".qty").val(newQuantity);

            // Cập nhật giá trị vào hidden input
            document.getElementById("hiddenQuantity").value = newQuantity;
        }
    });
});

$(document).ready(function () {
    document.getElementById("quantityInput").addEventListener("change", function() {
        var newQuantity = this.value;
        document.getElementById("hiddenQuantity").value = newQuantity;
    });
});

function validateRating() {
    // Lấy giá trị của trường rating
    var rating = document.getElementById('rating').value;
    
    // Kiểm tra nếu rating vẫn là 0 (người dùng chưa chọn sao) thì hiển thị thông báo
    if (rating == 0) {
        alert('Please select a rating before submitting your review.');
        return false; // Ngăn form được gửi đi
    }
    return true; // Cho phép form được gửi đi nếu đã chọn sao
}

</script>

<script>
$(document).ready(function(){
    $('.fa-star').on('click', function(){
        var rating = $(this).data('rating'); 
        $('#rating').val(rating); 
        $('.fa-star').removeClass('checked'); 
        $(this).addClass('checked');
        $(this).prevAll().addClass('checked');
        $('#rating-message').html('Bạn đã đánh giá ' + rating + ' sao.').css('color', '#28a745');
    });
});
</script>
</body>
</html>




