@extends('Admin.templates.tpl_default', ['pageId'=>'product'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/pr_list.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/detail_cate.css')}}">



@endsection

@section('content')
<main>
<div class="head-title">
				<div class="left">
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<p id="myText"></p>
						</li>
					</ul>
				</div>
			</div>
		
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>{{$cate->Name}}</h3>
					</div>
                    <a href="{{ route('admin.cate')}}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <div class="order-detail" style="margin-top: 30px;">
						<table>
							<thead>
								<tr>
									<th>Product id</th>
									<th>Product name</th>
									<th>Img</th>
									<th>Quantity</th>
									<th>Price per product</th>
								</tr>
							</thead>
              @foreach ($products as $product)
							<tbody>
								<tr>
									<td>{{$product->id}}</td>
									<td>{{ $product->product_name}}</td>
									<td>
        								<img src="./../../../{{ $product->images->first()->img_link }}" alt="{{ $product->product_name }} Image">
    								</td>
									<td>
                                        {{ $product->quantity}}
                                    </td>
                                    <td>
                                        {{ $product->price}}
                                    </td>
								</tr>
							</tbody>
              @endforeach
						</table>

					</div>
                    
					
				</div>
			</div>
</main>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/datatable.js')}}"></script>
@endsection