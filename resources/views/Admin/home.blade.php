@extends('Admin.templates.tpl_default', ['pageId'=>'home'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/home.css')}}">

@endsection


@section('content')
<main>
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
                        Số đơn hàng
                    </div>
                    <div class="number">{{ $totalOrders }}</div>
                    <div class="indicator">
                        <i class="bx bx-up-arrow-alt"></i>
                        <span class="text">Latest data</span>
                    </div>
                </div>
                <i class="bx bxs-cart-alt cart"></i>
            </div>
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
                        Doanh thu
                    </div>
                    <div class="number">{{ number_format($totalRevenue, 0, ',', '.') }}</div>
                    <div class="indicator">
                        <i class="bx bx-up-arrow-alt"></i>
                        <span class="text">Latest data</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
                        Tổng sản phẩm
                    </div>
                    <div class="number">{{ $totalProducts }}</div>
                    <div class="indicator">
                        <i class="bx bx-up-arrow-alt"></i>
                        <span class="text">Latest data</span>
                    </div>
                </div>
                <i class="bx bxs-shopping-bag cart three"></i>
            </div>
            <div class="box">
                <div class="left-side">
                    <div class="box_topic">
                        Tài khoản
                    </div>
                    <div class="number">{{ $totalUsers }}</div>
                    <div class="indicator">
                        <i class="bx bx-up-arrow-alt"></i>
                        <span class="text">Latest data</span>
                    </div>
                </div>
                <i class="bx bxs-user cart cart four"></i>
            </div>
        </div>

        <!-- ... rest of the HTML ... -->
        <!-- sales-content -->
        <div class="sales-boxes">
            <div class="recent-sale box">
                <div class="title">Các đơn hàng mới nhất</div>
                <div class="sales-details">
                    <ul class="details">
                        <li class="topic"><a href="#"><b>Thời gian</b></a></li>
                        @foreach ($recentOrders as $order)
                        <li><a href="#">{{ $order->created_at}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="details">
                        <li class="topic"><a href="#"><b>Khách hàng</b></a></li>
                        @foreach ($recentOrders as $order)
                        <li><a href="#">{{ $order->fullname }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="details">
                        <li class="topic"><a href="#"><b>Tình trạng</b></a></li>
                        @foreach ($recentOrders as $order)
                        <li><a href="#">{{ $order->status == 0 ? 'Chưa xử lí' : 'Đã xử lí' }}</a></li>
                        @endforeach
                    </ul>
                    <ul class="details">
                        <li class="topic"><a href="#"><b>Tổng tiền</b></a></li>
                        @foreach ($recentOrders as $order)
                        <li><a href="#">{{ $order->total_pay }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="button">
                    <a href="{{route('admin.orders')}}">Xem hết</a>
                </div>
            </div>
            <!-- ... rest of the sales boxes ... -->

            <div class="top-sales box">
                <div class="title">Sản phẩm bán chạy</div>
                <ul>
                    @foreach ($topSellingProducts as $product)

                    <li>
                        <a href="">
                            <img src="./../../../{{ $product->images->first()->img_link }}" alt="">
                            <span class="product_name">{{$product->product_name}}</span>
                        </a>
                        <span class="price">{{ number_format($product->price, 0, ',', '.') }} đ</span>
                    </li>
                    @endforeach

                    <li>
                </ul>
            </div>
        </div>
       

    </div>
    </div>
</main>
@endsection




@section('js')
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


@endsection