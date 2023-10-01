@extends('Admin.templates.tpl_default', ['pageId'=>'product_cate_add'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/product_cate_add.css')}}">

@endsection


@section('content')
<main>
    <div class="home-content">
        <div style=" margin-left:10px;margin-bottom:50px;">
                <a href="{{ route('admin.product')}}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                </a>
            <p style="font-weight: bold;font-size:x-large;">Sản phẩm bạn muốn thêm thuộc danh mục nào:</p>
        </div>
        <div class="overview-boxes">
            @foreach($categories as $category)
            <a href="{{ route('admin.product_add',['id' => $category->id])}}">
            <div class="box" style="margin-bottom: 50px; text-align:center">
                <div class="left-side">
                    <div class="box_topic" style="color: red;">
                        {{$category -> Name}}
                    </div>
                    <div class="number" style="font-weight:100;font-size:20px">Số sản phẩm: {{ $productCounts[$category->id] }}</div>
                </div>
            </div>
            </a>
            @endforeach
        </div>

       

    </div>
</main>
@endsection




@section('js')
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


@endsection